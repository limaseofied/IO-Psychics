<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ add this line
use App\Models\Admin;



class AdminLoginController extends Controller
{

    
     public function showLoginForm()
    {
        if (Auth::guard('super_admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function index()
    {
        $admin = Auth::guard('super_admin')->user();
        return view('admin.dashboard', compact('admin'));
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'captcha' => 'required|string',
        ]);

        // CAPTCHA validation
        if (
            !session()->has('captcha_text') ||
            now()->greaterThan(session('captcha_expires')) ||
            strtolower($request->captcha) !== strtolower(session('captcha_text'))
        ) {
            return back()
                ->withErrors(['captcha' => 'Invalid or expired CAPTCHA'])
                ->withInput();
        }

        session()->forget(['captcha_text','captcha_expires']);

        $credentials = $request->only('email','password');

        if (Auth::guard('super_admin')->attempt($credentials)) {

            $request->session()->regenerate();

            $admin = Auth::guard('super_admin')->user();
            $admin->last_login = now();
            $admin->save();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('super_admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
  

}
