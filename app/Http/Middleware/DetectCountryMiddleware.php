<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Symfony\Component\HttpFoundation\Response;

class DetectCountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userCountry = GeoIP::getLocation()->country;
        session(['user_country' => $userCountry]);
        return $next($request);    
    }
}
