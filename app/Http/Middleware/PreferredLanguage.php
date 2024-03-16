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
        $language = $request->session()->get('preferred_language');
        if(empty($language)){
            $language = "en";
        }
        app()->setLocale($language);
        return $next($request);
        // if($request->session()->get('preferred_language') == "1"){
        //     $response = $next($request);
        //     return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
        //             ->header('Pragma','no-cache')
        //             ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
        // }else{

        //     return redirect("admin");
        // }
        // return $next($request);
    }
}
