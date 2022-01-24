<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;
use App\Models\Detail;
use App\Models\User;
use File;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::User()->user_id;
        $users = User::select
            (
                'users.user_id',
                'users.name',
                'users.no_telp',
                'users.email',
                'detail_akun.alamat',
                'detail_akun.tgl_lahir',
                'detail_akun.jenis_kelamin',
            )
            ->rightJoin('detail_akun', 'detail_akun.detail_user_id', '=', 'users.user_id')
            ->where('users.user_id', '=', $id)->first();

            return view('backend/profile/profile', [
                'title' => 'Profile | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
                'users' => $users
            ]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $emailUpdate = User::where('user_id', Auth::user()->user_id)
        ->select('email')->first(); //ambil email berdasarkan auth user id

        $emailUpdate->email = $request->email; // cek inputan email apakah sama

        $user = User::where('user_id', Auth::user()->user_id)
        ->select('name','no_telp')->first();

        $user->name = $request->name;
        $user->no_telp = $request->no_telp;

        $pengurus = Detail::where('detail_user_id', Auth::user()->user_id)
        ->select('tgl_lahir','alamat','jenis_kelamin')->first();

        $pengurus->tgl_lahir = $request->tgl_lahir;
        $pengurus->alamat = $request->alamat;
        $pengurus->jenis_kelamin = $request->jenis_kelamin;

        if ($user->isDirty() || $pengurus->isDirty() || $emailUpdate->isDirty())
        {
            if ($emailUpdate->isDirty()) // jika email nya yg berubah maka diupdate
            {
                User::where('user_id', Auth::user()->user_id)
                ->update([
                    'email' => $request->email,
                ]);
            }

            User::where('user_id', Auth::user()->user_id)
            ->update([
                'name' => $request->name,
                'no_telp' => $request->no_telp,
                'updated_at' => now()
            ]);

            Detail::where('detail_user_id', Auth::user()->user_id)
            ->update([
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'updated_at' => now()
            ]);

            return back()->with('success', 'Berhasil Update Profile.');
        }

        //jika tidak ada perubahan inputan maka muncul pesan
        return back()->with('error', 'Kamu belum merubah data apapun !');
    }
}
