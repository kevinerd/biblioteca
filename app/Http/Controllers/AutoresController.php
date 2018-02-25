<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoresController extends Controller
{
    public function autores(){
        return view('autores');
    }

    public function store () {
        $response = array();

        try {
            // Busco los datos necesarios
            $id_productor   =   Auth::user()->productor->id;
            $id_compania    =   Input::get("id_compania", '');
            $requestID      =   Input::get("requestID", '');
            $error          =   Input::get("error", '');
            $id_cotizacion  =   Input::get("id_cotizacion", '');
            $emisionDetalles=   Input::get("emision", '');
            $nro_propuesta  =   Input::get("nro_propuesta", '');
            $param_emision  =   Input::get("parametros_emision", '');
            if ($requestID === null)
                throw new Exception("No esta difinido requestID", 500);

            DB::beginTransaction();
            // Guarda los datos del libro
            $libro                        =   new Libro();
            $libro->id_productor          =   $id_productor;
            $libro->id_compania           =   $id_compania;
            $libro->requestID             =   $requestID;
            $libro->error                 =   1;
            $libro->nro_poliza            =   ($emisionDetalles['enlace'] == 'CALEDONIA' || $emisionDetalles['enlace'] == 'ORBIS' ) ? $emisionDetalles['emision']['nroPoliza'] : $emisionDetalles['emision']['id'];
            $libro->premio                =   $emisionDetalles['emision']['premio'];
            $libro->prima                 =   $emisionDetalles['emision']['prima'];
            $libro->detalle               =   json_encode($emisionDetalles['emision']);
            $libro->nro_propuesta         =   $nro_propuesta;
            $libro->detalles_parametros   =   json_encode($param_emision);
            $libro->estado_emision        =   "";

            $libro->save();

            // Actualiza contratacion - asigna emision
            $contratacion             = ContratacionAuto::where('id', '=', $id_cotizacion)->orderBy('id', 'desc')
                ->first();
            $contratacion->id_emision = $emision->id;
            $contratacion->save();

            DB::commit();
            $response['error']        = false;
            $response['mensaje']      = 'Se guardó correctamente';
            $response['contratacion'] = $contratacion->id;
        } catch (Exception $ex) {
            DB::rollback();
            $response['mensaje'] = 'Error: ' . $ex->getMessage();
            $response['error']   = true;
        }
        return Response::json($response);
    }

    public function listadoEmisiones ($pantallaInicial = null) {
        $response = array();

        if (Auth::user()->tipo == 'empleados' || (Session::get('nivelOrganizacional') == 'organizador' && Auth::user()->tipo == 'productores')) {
            $id_productor = Input::get('productor', "");
        } else {
            $id_productor = Auth::user()->productor->id;
        }

        $usuarioActual  = usuarioActualParaNivelOrganizacional();
        $id_productores = [];
        $id_usuarios    = [];
        //preguntamos si tiene habilitado el modulo
        if (isModuloEnabled('organizador')) {
            if(is_array($usuarioActual) == true){
                $usuarioActual = $usuarioActual['usuarioAbuelo'];
            }
            $id_usuarios_productor = OrganizadorProductor::where('id_usuario_organizador', '=',$usuarioActual->id)
                ->pluck('id_usuario_productor')->toArray();
            //guardamos los ids de productores y de usuarios en variables distintas, para luego hacer las consultas
            //tanto en las cotizaciones cabeceras
            $id_usuarios = $id_usuarios_productor;
            $id_productores = Productor::whereIn('id_usuario',$id_usuarios)->pluck('id')->toArray();
            $id_usuarios[] =$usuarioActual->id;
            $id_productores[] = $usuarioActual->productor->id;
        }

        // si se muestra en la pantalla inicial, muestra los datos del ejecutivo o de los productores que tiene a cargo
        if( $pantallaInicial == true ){
            if(isModuloEnabled('ejecutivo_cuenta')){
                // si es ejecutivo, traemos los productores que tiene a cargo
                if( Auth::user()->productor->ejecutivo_cta == 1 ){
                    $productores_a_cargo = Productor::where('id_productor_ejecutivo_responsable','=',Auth::user()->productor->id)->pluck('id')->toArray();
                    $id_productores = array_intersect($productores_a_cargo,$id_productores);
                    $id_productores[] = Auth::user()->productor->id;
                }
            }
        }

        $cliente = Input::get('txtCliente', "");
        $vehiculo = Input::get('txtVehiculo', "");
        $origen = Input::get('origen', '');

        //Proceso la fecha desde
        if (Input::get("fechaDesde", "") === "") {
            $fechaDesde = "1990-01-01- 00:00:00";
        } else {
            $fechaDesde = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', Input::get("fechaDesde", ""))));
        }
        //Proceso la fecha hasta
        if (Input::get("fechaHasta", "") === "")
            $fechaHasta = (date("Y") + 1) . date("-m-d") . date(" H:i:s");
        else
            $fechaHasta = date("Y-m-d 23:59:59", strtotime(str_replace('/', '-', Input::get("fechaHasta", ""))));

        $query = Emision::query();
        if ($id_productor != "") {
            $query->where('id_productor', '=', $id_productor);
        }
        if ($cliente != '') {
            $query->join('contrataciones_auto as emision_auto', 'emision_auto.id_emision','=','emisiones.id');
            $query->join('clientes as cliente', 'cliente.id','=','emision_auto.id_cliente');
            $query->where('cliente.nombre', 'LIKE', '%'.$cliente.'%');
        }
        /*if ($vehiculo != '') {
            //$query->join('versiones as version', 'version.id_version', '=', 'cotizaciones_cabecera.version');
            //$query->join('modelos as modelo', 'modelo.id_modelo', '=', 'cotizaciones_cabecera.modelo');
            $query->join('marcas as marca', 'marca.id_marca', '=', 'cotizaciones_cabecera.marca');
            $query->whereHas('vehiculoMarca', function ($q) use ($vehiculo) {
                $q->where('descripcion', 'LIKE', '%' . $vehiculo . '%');
            });
        }*/
        /*if($origen != '')
            $query->where('cotizaciones_cabecera.origen', '=', $origen);*/
        $query->join('companias', 'emisiones.id_compania', '=', 'companias.id');
        $query  = $query->whereBetween('emisiones.created_at', array($fechaDesde, $fechaHasta));
        if(count($id_productores)>0){
            $query = $query->whereIn('emisiones.id_productor',$id_productores);
        }
        $emisionesCabecera = $query->select(array('emisiones.*','companias.enlace'))
            ->orderBy('emisiones.created_at', 'desc');

        // si viene de la pantalla inicial, retornamos la lista de cotizaciones
        if( $pantallaInicial == true ){
            return $emisionesCabecera->take(4)->get();
        }

        $emisionesCabecera = $emisionesCabecera->paginate(Input::get('paginacion', 10));


        $response['emisionesCabecera']   =   $emisionesCabecera;

        $productores = Productor::join('usuarios as usuario', 'usuario.id','=','productores.id_usuario')
            ->orderBy('usuario.apellido', 'asc')
            ->select('productores.*')
            ->with('usuario')
            ->where('usuario.id','<>','0')
            ->where('usuario.eliminado', '=', 0);
        if(count($id_productores)>0) {
            $productores = $productores->whereIn('usuario.id', $id_usuarios);
        }
        $response['productores'] = $productores->get();

        return View::make('emisiones.listado')->with($response);
    }

    public function ver($id) {

        $query    = Emision::query();
        $emision  = $query->where('id', '=', $id)
            ->select(array('emisiones.*'))->get()[0];

        $contratacion       =   $emision->contratacion;
        $hashCotizacion     =   $contratacion->cotizacion->hash;
        $idUltimaCotizacion =   $contratacion->id_cotizacion;
        $idCobertura        =   $contratacion->id_cobertura;

        $cotizacionCabecera =   CotizacionCabecera::where('hash','=', $hashCotizacion)->first();
        $compania           =   Compania::where('id', '=', $emision->id_compania)->first()->enlace;

        /*$contratacion   =   $emision->contratacion;
        // traigo el dato de cotizacion, ya que necesito los parametros de cotizacion
        $cotizacion =   $contratacion->cotizacion;
        $cliente    =   $contratacion->cliente;

        $vehiculo['marca']['id']   =   $contratacion->vehiculoCliente->id_marca;
        $vehiculo['marca']['descripcion']   =   $contratacion->vehiculoCliente->marca->descripcion;

        $vehiculo['modelo']['id']   =   $contratacion->vehiculoCliente->id_modelo;
        $vehiculo['modelo']['descripcion']   =   $contratacion->vehiculoCliente->modelo->descripcion;

        $vehiculo['version']['id']   =   $contratacion->vehiculoCliente->id_version;
        $vehiculo['version']['descripcion']   =   $contratacion->vehiculoCliente->version->descripcion;

    */
        /*return View::make('emisiones.detalle')->with(array('emision' => $emision, 'compania' => $compania,
            'cotizacion' => $cotizacion));*/
        /*$response   =   [];
        $response['id'] =   $id;
        $response['emision'] =   true;

        Redirect::route("companias.multicotizador")->with($response);*/

        $cia        =   new CompaniasController();
        $response   =   $cia->multicotizador($cotizacionCabecera->id, true);

        // vamos desde el detalle de emision
        $response['emision_detalle']    =   true;
        $response['emision']            =   $emision;
        $response['compania']           =   $compania;
        $response['ultCotizacionId']    =   $idUltimaCotizacion;
        $response['idCobertura']        =   $idCobertura;

        return View::make('companias.multicotizador')->with($response);
    }
}
