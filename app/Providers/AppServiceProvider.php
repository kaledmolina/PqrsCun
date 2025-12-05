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
        $this->app['request']->server->set('HTTP_X_FORWARDED_PROTO', 'https');
        $this->app['request']->headers->set('X-Forwarded-Proto', 'https'); // Also set in headers bag
        $_SERVER['HTTPS'] = 'on';
        $_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
        
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
