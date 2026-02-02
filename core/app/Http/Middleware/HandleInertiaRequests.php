<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'site_name' => config('app.name'),

            'turnstile' => [
                'site_key' => config('services.turnstile.site_key'),
            ],

            'policies' => @get_content('policy_pages.element', orderById:true),

            'auth.admin' => fn() => Auth::guard('admin')->user()?->only('id','username','email','image'),

            'session' => function () {
                return [
                    'notify'    => Session::get('notify'),
                ];
            },

            'categories' => Category::active()->orderBy('name')->get(['slug', 'name']),
        ];
    }
}
