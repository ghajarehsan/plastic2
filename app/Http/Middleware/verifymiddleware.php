<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class verifymiddleware
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

        if (Auth::check()) {

            $result = Auth::user()->hasVerifiedEmail();

            if (!$result) {

                session()->flash('notverifiedyet', true);

            }


        }

        return $next($request);

    }
}
