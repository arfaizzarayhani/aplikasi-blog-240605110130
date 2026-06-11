<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Blade directive untuk handle default image
        Blade::directive('profileImage', function ($filename) {
            return "<?php echo asset('storage/foto/' . ({$filename} ?? 'default.png')); ?>";
        });

        // Blade directive untuk default image fallback
        Blade::directive('profileImageFallback', function ($filename) {
            return "<?php 
                \$url = asset('storage/foto/' . ({$filename} ?? 'default.png'));
                \$fallback = 'data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22%3E%3Crect fill=%22%23f0f0f0%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 font-family=%22Arial%22 font-size=%2224%22 fill=%22%23999%22 text-anchor=%22middle%22 dy=%22.3em%22%3E?%3C/text%3E%3C/svg%3E';
                echo \$url;
            ?>";
        });
    }
}
