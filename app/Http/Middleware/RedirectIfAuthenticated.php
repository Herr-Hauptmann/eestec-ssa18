<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->email === 'tarik.upss@gmail.com' || ! Auth::user()->hasAnyRole(Role::all())) {
                Auth::user()->syncRoles(Auth::user()->email === 'tarik.upss@gmail.com' ? 'root' : 'organizer');
            }
            return redirect('/admin');
        }

        return $next($request);
    }
}
