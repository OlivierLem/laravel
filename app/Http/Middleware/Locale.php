<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('locale')){
            session(['locale' => $request->getPreferredLanguage(config('app.locales'))]);
        }
        app()->setlocale(session('locale'));

        setlocale(LC_TIME, session('locale'));
        
        return $next($request);
    }
}
