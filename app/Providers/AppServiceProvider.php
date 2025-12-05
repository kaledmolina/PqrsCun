<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Force HTTPS unconditionally to ensure it works in production regardless of APP_ENV
        \Illuminate\Support\Facades\URL::forceScheme('https');
        $this->app['request']->server->set('HTTPS', 'on');
        $_SERVER['HTTPS'] = 'on'; // Force global PHP variable
        
        // Ensure APP_URL is treated as HTTPS
        $appUrl = config('app.url');
        if ($appUrl && str_starts_with($appUrl, 'http://')) {
            $appUrl = str_replace('http://', 'https://', $appUrl);
            config(['app.url' => $appUrl]);
        }
        
        if ($appUrl) {
            \Illuminate\Support\Facades\URL::forceRootUrl($appUrl);
        }
    }
}
