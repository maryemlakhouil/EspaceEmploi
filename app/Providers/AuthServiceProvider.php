<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les politiques de l'application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Enregistre les politiques de l'application.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies(); 

        // Si nécessaire, tu peux créer les rôles de manière programmatique ici
        Role::create(['name' => 'recruiter']);
        Role::create(['name' => 'chercheur']);
    }
}
