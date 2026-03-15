<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AutoLogout
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('super_admin')->check()) {
            $lastActivity = Session::get('last_activity_time');
            $now = Carbon::now();

            if ($lastActivity && $now->diffInMinutes($lastActivity) > 120) {
                Auth::guard('super_admin')->logout();
                Session::flush();
                return redirect()->route('admin.login')->with('message', 'Session expired. Please login again.');
            }

            Session::put('last_activity_time', $now);
        }

        return $next($request);
    }
}
