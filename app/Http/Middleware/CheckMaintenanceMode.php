<?php

namespace App\Http\Middleware;

use App\Helpers\ConfigHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $maintenanceMode = ConfigHelper::getConfig('maintenance_mode', '0');

        if ($maintenanceMode === '1') {
            // Check if request is NOT for admin routes
            if (! $request->is('admin') && ! $request->is('admin/*')) {
                return response()->view('maintenance', [], 503);
            }
        }

        return $next($request);
    }
}
