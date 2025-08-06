<?php

namespace App\Providers;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Carbon\Carbon;
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
        RateLimiter::for('login', function (Request $request) {
            $key = $request->email.$request->ip();
        
            // Batasi login hingga 5 kali dalam 1 menit
            if (RateLimiter::tooManyAttempts($key, 3)) {
                // Bekukan login selama 1 jam
                $availableIn = RateLimiter::availableIn($key);
                if ($availableIn < 3600) {
                    RateLimiter::hit($key, 3600);  // Tambahkan waktu bekukan menjadi 1 jam
                }
        
                return Limit::none()->response(function() use ($availableIn) {
                    return response()->json([
                        'message' => 'Login dibekukan. Coba lagi dalam ' . ceil($availableIn / 60) . ' menit.',
                    ], 429);
                });
            }
        
            return Limit::perMinute(5)->by($key);
        });
    }
}
