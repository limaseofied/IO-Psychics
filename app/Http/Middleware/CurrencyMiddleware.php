<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CurrencyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Get currency from session or default
        $currency = session('currency', \App\Models\Currency::DEFAULT);
        // Share globally with all views
        view()->share('currentCurrency', $currency);
        return $next($request);
    }
}
