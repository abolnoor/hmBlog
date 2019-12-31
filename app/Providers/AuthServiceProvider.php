<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Article' => 'App\Policies\ArticlePolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];
    protected $gates = [
        'see-dashboard' => 'App\Gates\DashboardGate',
        'see-article' => 'App\Gates\ArticleGate@see',
        'manage-article' => 'App\Gates\ArticleGate@manage',
        'manage-tag' => 'App\Gates\TagGate@manage',
        'manage-user' => 'App\Gates\UserGate',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerGates();

        //
    }
    public function registerGates()
    {
        foreach ($this->gates as $key => $value) {
            Gate::define($key, $value);
        }
    }
}
