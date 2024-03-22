<?php

namespace App\Http\Middleware;

use Closure;

class PreferredLanguage
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if(empty(session('locale'))){
            $locale = $request->session()->put('locale', 'en');
        } else {
            $locale = session('locale');
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
