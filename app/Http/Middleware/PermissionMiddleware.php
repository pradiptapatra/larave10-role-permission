<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
       /*  if(!$request->user()->hasRole($role)) {
            abort(404);
        } */

        if(!count($request->user()->roles)) {
            abort(404);
        }

        if($request->user()->roles[0]->slug === 'admin') {
            return $next($request);
        }

        //dd($request->user()->can($permission));

        if($permission && $request->user()->can($permission)) {
            return $next($request);
        }

        abort(404);
    }
}
