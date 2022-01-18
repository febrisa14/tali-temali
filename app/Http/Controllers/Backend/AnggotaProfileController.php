<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pengurus;
use App\Models\User;
use File;
use Image;

class AnggotaProfileController extends Controller
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
                'anggota.alamat',
                'anggota.tgl_lahir',
                'anggota.jenis_kelamin',
            )
            ->rightJoin('anggota', 'anggota.anggota_user_id', '=', 'users.user_id')
            ->where('users.user_id', '=', $id)->first();

            return view('frontend/profile/profile', [
                'title' => 'Profile | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
                'users' => $users
            ]);
    }
}
