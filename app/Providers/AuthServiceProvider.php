<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Libro;
use App\Models\Permiso;
use App\Models\Etiqueta;
use App\Policies\ClientePolicy;
use App\Policies\LibroPolicy;
use App\Policies\PermisoPolicy;
use App\Policies\EtiquetaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => ClientePolicy::class,
        Libro::class => LibroPolicy::class,
        Permiso::class => PermisoPolicy::class,
        Etiqueta::class => EtiquetaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
