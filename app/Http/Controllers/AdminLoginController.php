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

       $request->validate([
             'email'    => 'required|email',
            'password' => 'required|string',
            'captcha'      => 'required|string',
        ]);


         $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string'
        ]);


         // CAPTCHA validation
        if (
            !session()->has('captcha_text') ||
            now()->greaterThan(session('captcha_expires')) ||
            $request->captcha !== session('captcha_text')
        ) {
            return back()
                ->withErrors(['captcha' => 'Invalid or expired CAPTCHA'])
                ->withInput();
        }

        // Clear CAPTCHA after successful validation
        session()->forget(['captcha_text', 'captcha_expires']);


        if (Auth::guard('super_admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // Optionally update last login
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
