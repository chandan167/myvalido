<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function showLoginPage()
    {
        $this->setPageTitle(config('constant.page_title.admin.login'));
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validate = $request->validated();
        $user = User::where('email', $validate['email'])->first();
        if ($user && Hash::check($validate['password'], $user->password)) {
            if ($user->status) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }
            return back()->withErrors([
                'email' => trans('auth.blocked'),
            ]);
        }
        return back()->withErrors([
            'email' => trans('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
