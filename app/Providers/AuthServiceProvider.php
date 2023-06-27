<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    { 
        $this->registerPolicies();

        //Mengatur Hak Akses untuk Penyedia
        Gate::define('Penyedia-only', function ($user) {
           if ($user->level == 'Penyedia'){
            return true; 
        } 
        return false; 
    });

         $this->registerPolicies();
        //Mengatur Hak Akses untuk Penjual
        Gate::define('Penjual-only', function ($masuk) {
            if ($masuk->level == 'Penjual'){
            return true; 
        } 
        return false; 
    });
    
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Pengrajin
        Gate::define('Pengrajin-only', function ($stok_keluar) {
            if ($stok_keluar->level == 'Pengrajin'){
            return true; 
        } 
        return false; 
    });

      
}
}