<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //check here if the user is authenticated
        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        return $next($request);
    }

}
