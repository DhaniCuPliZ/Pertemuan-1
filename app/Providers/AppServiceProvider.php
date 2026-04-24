<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate untuk mengatur akses ke produk
        Gate::define('manage-product', function ($user) {
            return $user->role === 'admin';
        });

        // Menambahkan Gate untuk mengatur akses ke kategori
        Gate::define('view-category', function ($user) {
            return $user->role === 'admin'; // Hanya admin yang bisa melihat kategori
        });

        // Menetapkan policy untuk Product
        Gate::policy(Product::class, ProductPolicy::class);
    }
}