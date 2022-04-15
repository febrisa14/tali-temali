<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;
use App\Models\Detail;
use Carbon\Carbon;
use App\Models\User;
use File;
use Image;

class MasyarakatProfileController extends Controller
{
    public function index()
    {
        $id = Auth::User()->user_id;
        $users = User::select
            (
                'users.user_id',
                'users.name',
                // 'users.no_ca',
                'users.no_telp',
                'users.email',
                'detail_akun.alamat',
                'detail_akun.tgl_lahir',
                'detail_akun.jenis_kelamin',
            )
            ->rightJoin('detail_akun', 'detail_akun.detail_user_id', '=', 'users.user_id')
            ->where('users.user_id', '=', $id)->first();

            return view('frontend/profile/profile_masyarakat', [
                'title' => 'Profile Masyarakat | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
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
        // $user->no_ca = $request->no_ca;

        $anggota = Detail::where('detail_user_id', Auth::user()->user_id)
        ->select('tgl_lahir','alamat','jenis_kelamin')->first();

        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->alamat = $request->alamat;
        $anggota->jenis_kelamin = $request->jenis_kelamin;

        if ($user->isDirty() || $anggota->isDirty() || $emailUpdate->isDirty())
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
                // 'no_ca' => $request->no_ca,
                'no_telp' => $request->no_telp,
                'updated_at' => now()
            ]);

            Detail::where('detail_user_id', Auth::user()->user_id)
            ->update([
                'tgl_lahir' => $request->tgl_lahir,
                'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
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
