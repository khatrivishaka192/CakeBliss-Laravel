<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Closure;
use Session;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if(!Session::get('admin_logged_in')){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
