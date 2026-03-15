<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class SuperAdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('super_admin')->check()) {
            return redirect()->route('admin.login');
        }
        return $next($request);

    }
}
