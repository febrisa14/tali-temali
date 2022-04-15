<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Detail;
use DataTables;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('user_id', 'name', 'no_ca', 'role')
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id','<>',Auth::User()->user_id)
                    ->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    if ($data->role == "Masyarakat")
                    {
                        $actionBtn = ' <a href="javascript:void(0)" data-id="' . $data->user_id . '" class="delete btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                        return $actionBtn;
                    }
                    else
                    {
                        $actionBtn = ' <a href="/admin/pengguna/'.$data->user_id.'/edit" class="editdata btn btn-sm btn-alt-success" data-toggle="tooltip" title="Edit Data"><i class="fa fa-fw fa-edit"></i> Ubah</a>';
                        $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-id="' . $data->user_id . '" class="delete btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                        return $actionBtn;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend/pengguna/pengguna_index', [
            'title' => 'List Pengguna | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pengguna/pengguna_add', [
            'title' => 'Tambah Data Pengguna | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'role' => 'required',
            'no_telp' => 'required|numeric',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_ca' => 'required',
            'alamat' => 'required'
        ]);

        $users = User::create([
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'name' => $request->name,
            'no_ca' => $request->no_ca,
            'role' => $request->role,
            'no_telp' => $request->no_telp,
        ]);

        $usersId = $users->user_id;

        Detail::create([
            'detail_user_id' => $usersId,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
            'alamat' => $request->alamat
        ]);

        return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil Menambahkan Pengguna.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::select(
                'users.user_id',
                'users.email',
                'users.name',
                'users.role',
                'users.no_ca',
                'users.no_telp',
                'detail_akun.alamat',
                'detail_akun.tgl_lahir',
                'detail_akun.jenis_kelamin',
            )
            ->rightJoin('detail_akun', 'detail_akun.detail_user_id', '=', 'users.user_id')
            ->where('users.user_id',$id)->first();

        return view('backend/pengguna/pengguna_edit', [
            'title' => 'Ubah Data Pengguna | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id.',user_id',
            'no_telp' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'name' => 'required',
            'tgl_lahir' => 'required',
            'no_ca' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        //dapetin data2 anggota
        $user = User::select(
            'users.user_id',
            'users.email',
            'users.name',
            'users.role',
            'users.no_ca',
            'users.no_telp',
            'detail_akun.alamat',
            'detail_akun.tgl_lahir',
            'detail_akun.jenis_kelamin',
        )
        ->rightJoin('detail_akun', 'detail_akun.detail_user_id', '=', 'users.user_id')
        ->where('users.user_id',$id)->first();

        //setelah dapetin datanya cek satu2 inputannya apakah ada yg berubah?
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->no_telp = $request->no_telp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_ca = $request->no_ca;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;

        //jika ada yang berubah maka jalankan if isDirty()
        if ($user->isDirty())
        {
            User::where('user_id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'no_ca' => $request->no_ca,
                'no_telp' => $request->no_telp,
                'updated_at' => now()
            ]);

            Detail::where('detail_user_id',$id)->update([
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil Update Data Pengguna.');
        }

        return back()->with('error', 'Kamu belum merubah data apapun !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Pengguna'
        ]);
    }
}
