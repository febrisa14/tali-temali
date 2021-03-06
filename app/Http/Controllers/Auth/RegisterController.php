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

    public function store(Request $request)
    {
        //check apakah dia masyarakat atau tidak
        if ( $request->checkbox_masyarakat == "on" )
        {
            $request->validate([
                'email' => 'required|email|unique:users',
                'name' => 'required',
                'password' => 'required',
                'checkbox_1' => 'required',
            ]);

            $users = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'no_ca' => NULL,
                'no_telp' => NULL,
                'role' => 'Masyarakat'
            ]);

            $usersId = $users->user_id;

            Detail::create([
                'detail_user_id' => $usersId,
                'tgl_lahir' => NULL,
                'jenis_kelamin' => NULL,
                'umur' => NULL,
                'alamat' => NULL,
            ]);

            return redirect()->route('login')->with('success', 'Berhasil Registrasi Masyarakat.');
        }
        //jika bukan masyarakat register anggota
        else
        {
            $request->validate([
                'email' => 'required|email|unique:users',
                'name' => 'required',
                'no_ca' => 'required',
                'password' => 'required',
                'checkbox_1' => 'required',
                'checkbox_2' => 'required',
                'checkbox_3' => 'required',
            ]);

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

            return redirect()->route('login')->with('success', 'Berhasil Registrasi Anggota.');
        }
    }
}
