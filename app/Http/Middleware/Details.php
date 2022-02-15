<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Detail;

class Details
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
        $user = Detail::where('detail_user_id', Auth::user()->user_id)->first();

        if ($user->tgl_lahir == "" && $user->jenis_kelamin == "" && $user->umur == "" && $user->alamat == "")
        {

            session()->flash('error', 'Silahkan lengkapi detail akun anda pada menu profile !');
            return back();
        }

        return $next($request);
    }
}
