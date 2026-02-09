<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistre les services d'application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap les services d'application.
     *
     * @return void
     */
    public function boot()
    {
        // Crée les rôles uniquement s'ils n'existent pas
        Role::firstOrCreate(['name' => 'recruiter']);
        Role::firstOrCreate(['name' => 'chercheur']);
    }
}
