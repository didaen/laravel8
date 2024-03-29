<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Membuat aturan untuk admin
        // Gate tidak perlu aturan autentikasi lagi
        // karena Gate itu aturan untuk user yang sudah bisa login
        // Setelah login ngapain
        Gate::define('admin', function(User $user) {

            // Gerbangnya hanya bisa diakses oleh user dengan username didaen
            // return $user->username === 'didaen';

            // Karena sudah membuat field is_admin pada tabel users, pengecekan admin atau bukan melalui tabel ini
            // Nilai defaultnya 0, admin 1
            return $user->is_admin;
        });
    }
}
