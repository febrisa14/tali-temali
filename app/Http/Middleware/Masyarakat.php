<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Masyarakat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'Masyarakat')
        {
            return $next($request);
        }

        session()->flash('error', 'Halaman ini hanya bisa diakses oleh Masyarakat !');
        return back();
    }
}
