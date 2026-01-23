<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function loginform()
    {
        $page_title = "Admin Login";
        return Inertia::render('admin/auth/login', compact('page_title'));
    }


    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'captcha'  => 'sometimes|required',
        ]);

        if(!verify_captcha()){
            $notify[] = ['error','Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        if (Auth::guard('admin')->attempt($request->only('username', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('gdadmin');
        }

        return back()->withErrors([
            'username' => 'Login failed. Check your credentials.',
            'password' => 'Login failed. Password does not match.',
        ]);
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        return redirect('gdadmin');
    }
}
