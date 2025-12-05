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
        if($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', 'on');
            $_SERVER['HTTPS'] = 'on'; // Force global PHP variable
            
            // Ensure APP_URL is treated as HTTPS
            $appUrl = config('app.url');
            if (str_starts_with($appUrl, 'http://')) {
                $appUrl = str_replace('http://', 'https://', $appUrl);
                config(['app.url' => $appUrl]);
            }
            \Illuminate\Support\Facades\URL::forceRootUrl($appUrl);
        } else {
             // Fallback for non-production environments if needed, or keep unconditional if preferred. 
             // Given the user's issue is in production, let's target production specifically or just leave it unconditional but safer.
             // Let's stick to the user's request context: "en produccion".
             // But the previous "unconditional" attempt failed. Let's make it robust.
             \Illuminate\Support\Facades\URL::forceScheme('https');
             $this->app['request']->server->set('HTTPS', 'on');
             $_SERVER['HTTPS'] = 'on';
        }
    }
}
