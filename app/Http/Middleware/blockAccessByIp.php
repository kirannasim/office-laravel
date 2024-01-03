<?php

namespace App\Http\Middleware;

use Closure;
use GeoIP;

class blockAccessByIp
{

    protected static $affiliate_identifier_get_names = [
        'a',
        'ref',
        'r',
        'sponsor',
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $blockIPs = [
            '91.180.89.51',
        ];
        $blockCities = [
            'brussels',
        ];

        if (
            (!empty($request->ip()) && in_array($request->ip(), $blockIPs))
            ||
            (in_array(strtolower(@GeoIP::getLocation()['city']), $blockCities))
        ) {
            die('.');
        }

        return $next($request);
    }
}
