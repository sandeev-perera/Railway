<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = ["applicant", "passenger"];
        if (!in_array(session('role'), $roles)) {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }             
        return $next($request);
    }
}
