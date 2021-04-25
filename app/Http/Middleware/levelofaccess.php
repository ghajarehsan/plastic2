<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class levelofaccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $auth = Auth::user()->position;

         if ($auth != 2) {

            return redirect()->route('home');

        }


        return $next($request);
    }
}
