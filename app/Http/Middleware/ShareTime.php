<?php

namespace App\Http\Middleware;

use Closure;
use GeoIP;
use Illuminate\Http\Request;
use View;

class ShareTime
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $timeZone = GeoIP::getLocation()->timezone;

        $servertimezone = now()->timezone;
        View::share([
            'shareTime' => [
                'localTimeZone' => $timeZone,
                'localTimeStamp' => now($timeZone)->timestamp,
                'localTime' => now($timeZone)->format('H:i:s'),
                'serverTimeStamp' => now()->timestamp,
                'serverTimeZone' => $servertimezone->getName(),
                'serverTime' => now()->format('H:i:s')
            ]
        ]);

        return $next($request);
    }
}
