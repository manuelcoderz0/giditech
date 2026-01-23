<?php

namespace App\Providers;

use App\Constants\Status;
use App\Lib\Searchable;
use App\Models\AdminNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Builder::mixin(new Searchable);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            'admin_notifications' => function () {
                if (Auth::guard('admin')->check()) {
                    return AdminNotification::where('is_read', Status::NO)->with('user')->orderBy('id', 'desc')->take(10)->get();
                }
                return [];
            },
            'admin_notification_count' => function () {
                if (Auth::guard('admin')->check()) {
                    return AdminNotification::where('is_read', Status::NO)->count();
                }
                return 0;
            },
        ]);

        
        \URL::forceScheme('https');
        
    }
}
