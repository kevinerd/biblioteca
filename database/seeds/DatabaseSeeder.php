<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $catidadUsuarios = 200;

        factory(User::class, $catidadUsuarios)->create();
    }
}
