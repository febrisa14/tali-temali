<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AnggotaRequest;
use App\Models\User;
use App\Models\Anggota;
use DataTables;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('users.user_id', 'users.name', 'anggota.jenis_kelamin', 'anggota.umur')
                    ->rightJoin('anggota', 'anggota.anggota_user_id', '=', 'users.user_id')
                    ->orderBy('users.created_at', 'DESC')
                    ->get();
                
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = ' <a href="/admin/anggota/'.$data->user_id.'/edit" class="editdata btn btn-sm btn-alt-success" data-toggle="tooltip" title="Edit Data"><i class="fa fa-fw fa-edit"></i> Ubah</a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-id="' . $data->user_id . '" class="delete btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend/anggota/anggota_index', [
            'title' => 'List Anggota | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/anggota/anggota_add', [
            'title' => 'Tambah Data Anggota | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggotaRequest $request)
    {
        $users = User::create([
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'role' => 'Anggota',
        ]);

        $usersId = $users->user_id;

        Anggota::create([
            'anggota_user_id' => $usersId,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
            'alamat' => $request->alamat
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Berhasil Menambahkan Anggota.');   
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
            'users.no_telp',
            'anggota.alamat',
            'anggota.tgl_lahir',
            'anggota.jenis_kelamin',
        )
        ->rightJoin('anggota', 'anggota.anggota_user_id', '=', 'users.user_id')
        ->where('users.user_id', '=', $id)->first();

        return view('backend/anggota/anggota_edit', [
            'title' => 'Ubah Data Anggota | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
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
            'name' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::select(
            'users.user_id',
            'users.email',
            'users.name',
            'users.no_telp',
            'anggota.alamat',
            'anggota.tgl_lahir',
            'anggota.jenis_kelamin',
        )
        ->rightJoin('anggota', 'anggota.anggota_user_id', '=', 'users.user_id')
        ->where('users.user_id', '=', $id)->first();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->no_telp = $request->no_telp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;

        if ($user->isDirty())
        {
            User::where('user_id', $id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'no_telp' => $request->no_telp,
                'updated_at' => now()
            ]);

            Anggota::where('anggota_user_id', $id)->update([
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                'alamat' => $request->alamat,
                'updated_at' => now()
            ]);

            return redirect()->route('admin.anggota.index')->with('success', 'Berhasil Memperbarui Data Anggota.');
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
            'message' => 'Berhasil Menghapus Data Anggota'
        ]);
    }
}
