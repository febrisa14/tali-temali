<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Auth;
use App\Models\User;
use Hash;

class PasswordController extends Controller
{
    public function changePassword(PasswordRequest $request)
    {
        $id = Auth::User()->user_id;

        User::find($id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengganti Password.');
    }
}
