<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class anggota_masyarakat
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
        if (Auth::User()->role == 'Anggota' || Auth::User()->role == 'Masyarakat')
        {
            return $next($request);
        }

        session()->flash('error', 'Halaman ini hanya bisa diakses oleh Anggota / Masyarakat !');
        return back();
    }
}
