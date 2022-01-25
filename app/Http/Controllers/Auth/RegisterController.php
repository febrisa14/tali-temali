<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Hash;
use App\Models\User;
use App\Models\Detail;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function create()
    {
        return view ('auth/register', [
            'title' => 'Register | Sistem Informasi Sekaa Teruna Dharma Gargitha'
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $users = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'no_ca' => $request->no_ca,
            'no_telp' => NULL,
            'role' => 'Anggota'
        ]);

        $usersId = $users->user_id;

        Detail::create([
            'detail_user_id' => $usersId,
            'tgl_lahir' => NULL,
            'jenis_kelamin' => NULL,
            'umur' => NULL,
            'alamat' => NULL,
        ]);

        return redirect()->route('login')->with('success', 'Berhasil Registrasi.');
    }
}
