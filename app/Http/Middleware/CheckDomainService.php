<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckDomainService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($_SERVER['HTTP_HOST'] == 'lamirau.local') {
            Session::put('website_id', 1); // Lamirau
            Session::put('website_folder', 'lamirau');
        }
        if($_SERVER['HTTP_HOST'] == 'lamirau.ingenierie') {
            Session::put('website_id', 2); // Lamirau Ingenierie
            Session::put('website_folder', 'lamirau-ingenierie');
        }
        else if($_SERVER['HTTP_HOST'] == 'spirometrie.local') {
            Session::put('website_id', 3); // Spirometrie
            Session::put('website_folder', 'spirometrie');
        }
        else if($_SERVER['HTTP_HOST'] == 'pneumotel.local') {
            Session::put('website_id', 4); // Pneumotel
            Session::put('website_folder', 'pneumotel');
        }
        else {
            Session::put('website_id', 5); // MIR France
            Session::put('website_folder', 'mirfrance');
        }

        return $next($request);
    }
}
