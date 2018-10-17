<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        User::created(function($user){
            Mail::to($user)->send(new UserCreated($user));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
