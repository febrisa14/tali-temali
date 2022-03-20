<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('avoid-back')->only('create');
    }

    public function create()
    {
        return view('auth.login', [
            'title' => 'Login | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    public function store(LoginRequest $request)
    {
        $user = User::where('email','=',$request->email)->first();

        if ($user == null)
        {
            return redirect()->back()->with('failed','Akun tidak terdaftar pada sistem.');
        }

        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role == "Anggota")
        {
            return redirect()->route('home')->with('success', 'Berhasil Login ke sistem');
        }
        else if (Auth::user()->role == "Pengurus")
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}
