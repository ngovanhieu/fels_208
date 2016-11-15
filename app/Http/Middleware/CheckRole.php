<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!($request->user()->isAdmin() || $request->user()->isSuperAdmin())) {
            // Redirect...
            return redirect('/home')->with('status', trans('fels.forbidden'));
        }

        return $next($request);
    }
}
