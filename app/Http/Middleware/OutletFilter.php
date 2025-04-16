<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutletFilter
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user) {
            // Jika user bukan admin/supervisor → share outlet_id ke semua view
            if (!in_array($user->role, ['admin', 'supervisor'])) {
                view()->share('filter_outlet_id', session('outlet_id'));
            } else {
                view()->share('filter_outlet_id', null);
            }
        }

        return $next($request);
    }
}
