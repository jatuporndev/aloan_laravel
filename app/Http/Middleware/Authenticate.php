<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('admin.login');
        // }
        if (! $request->expectsJson()) {

            if($request->routeIs('loaner.*')){
                return route('loaner.login');
            }
            if($request->routeIs('borrower.*')){
                return route('borrower.login');
            }
            return route('admin.login');
    }   }
}
