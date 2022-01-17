<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus;
use App\Models\User;
use App\Models\Anggota;
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
            $data = User::select('user_id', 'name', 'role')
                    ->orderBy('created_at', 'DESC')
                    ->get();

                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    if (Auth::User()->user_id != $data->user_id) //jika user bukan dirinya sendiri
                    {
                        if ($data->role == "Pengurus") //jika rolenya pengurus hiilangkan tombol Hapus karena pengurus tidak bisa dihapus, tapi anggota bisa
                        {
                            $actionBtn = ' <a href="/admin/pengguna/'.$data->user_id.'/edit" class="editdata btn btn-sm btn-alt-success" data-toggle="tooltip" title="Edit Data"><i class="fa fa-fw fa-edit"></i> Ubah</a>';
                            // $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-id="' . $data->user_id . '" class="delete btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                            return $actionBtn;
                        }

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
            'no_telp' => 'required|numeric',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'alamat' => 'required'
        ]);

        if ($request->role == "Anggota")
        {
            $users = User::create([
                'email' => $request->email,
                'password' => Hash::make('12345678'),
                'name' => $request->name,
                'no_telp' => $request->no_telp,
                'role' => 'Anggota'
            ]);

            $usersId = $users->user_id;

            Anggota::create([
                'anggota_user_id' => $usersId,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                'alamat' => $request->alamat
            ]);
        }
        else
        {
            $users = User::create([
                'email' => $request->email,
                'password' => Hash::make('12345678'),
                'name' => $request->name,
                'no_telp' => $request->no_telp,
                'role' => 'Pengurus'
            ]);

            $usersId = $users->user_id;

            Pengurus::create([
                'pengurus_user_id' => $usersId,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                'alamat' => $request->alamat
            ]);
        }

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
        $userRole = User::select('role')->where('users.user_id', '=', $id)->first();

        if ($userRole->role == "Pengurus")
        {
            $user = User::select(
                'users.user_id',
                'users.email',
                'users.name',
                'users.no_telp',
                'users.role',
                'pengurus.alamat',
                'pengurus.tgl_lahir',
                'pengurus.jenis_kelamin',
            )
            ->rightJoin('pengurus', 'pengurus.pengurus_user_id', '=', 'users.user_id')
            ->where('users.user_id',$id)->first();
        }
        else
        {
            $user = User::select(
                'users.user_id',
                'users.email',
                'users.name',
                'users.no_telp',
                'users.role',
                'anggota.alamat',
                'anggota.tgl_lahir',
                'anggota.jenis_kelamin',
            )
            ->rightJoin('anggota', 'anggota.anggota_user_id', '=', 'users.user_id')
            ->where('users.user_id', $id)->first();
        }

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
            'name' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required'
        ]);

        //identifikasi user role terlebih dahulu
        $userRole = User::select('role')->where('users.user_id', '=', $id)->first();

        //cek apakah rolenya pengurus
        if ($userRole->role == "Pengurus")
        {
            //dapetin data2 pengurus
            $user = User::select(
                'users.user_id',
                'users.email',
                'users.name',
                'users.no_telp',
                'users.role',
                'pengurus.alamat',
                'pengurus.tgl_lahir',
                'pengurus.jenis_kelamin',
            )
            ->rightJoin('pengurus', 'pengurus.pengurus_user_id', '=', 'users.user_id')
            ->where('users.user_id', '=', $id)->first();
        }
        else //jika tidak
        {
            //dapetin data2 anggota
            $user = User::select(
                'users.user_id',
                'users.email',
                'users.name',
                'users.role',
                'users.no_telp',
                'anggota.alamat',
                'anggota.tgl_lahir',
                'anggota.jenis_kelamin',
            )
            ->rightJoin('anggota', 'anggota.anggota_user_id', '=', 'users.user_id')
            ->where('users.user_id', '=', $id)->first();
        }

        //setelah dapetin datanya cek satu2 inputannya apakah ada yg berubah?
        $user->email = $request->email;
        $user->name = $request->name;
        $user->no_telp = $request->no_telp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->role = $request->role;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;

        //jika ada yang berubah maka jalankan if isDirty()
        if ($user->isDirty())
        {
            //cek apakah rolenya berubah?
            if ($user->isDirty('role'))
            {
                //jika rolenya berubah dari anggota jadi pengurus
                if($request->role == "Pengurus")
                {
                    // $getId = User::select('user_id')->where('user_id', '=', $id)->first();

                    User::where('user_id', $id)->update([
                        'role' => $request->role,
                        'updated_at' => now()
                    ]);

                    Pengurus::create([
                        'pengurus_user_id' => $id,
                        'tgl_lahir' => $request->tgl_lahir,
                        'alamat' => $request->alamat,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                    ]);

                    $hapusanggota = Anggota::where('anggota_user_id',$id)->delete();

                    return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil Update Data Pengguna.');
                }
                else //jika role berubah dari pengurus jadi anggota
                {
                    User::where('user_id', $id)->update([
                        'role' => $request->role,
                        'updated_at' => now()
                    ]);

                    Anggota::create([
                        'anggota_user_id' => $id,
                        'tgl_lahir' => $request->tgl_lahir,
                        'alamat' => $request->alamat,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                    ]);

                    $hapuspengurus = Pengurus::where('pengurus_user_id',$id)->delete();

                    return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil Update Data Pengguna.');
                }
            }
            else //jika rolenya tidak berubah tapi data yg lain berubah
            {
                if ($request->role == "Pengurus")
                {
                    User::where('user_id',$id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'no_telp' => $request->no_telp,
                        'updated_at' => now()
                    ]);

                    Pengurus::where('pengurus_user_id',$id)->update([
                        'tgl_lahir' => $request->tgl_lahir,
                        'alamat' => $request->alamat,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                        'updated_at' => now(),
                    ]);

                    return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil Update Data Pengguna.');
                }
                else
                {
                    User::where('user_id',$id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'no_telp' => $request->no_telp,
                        'updated_at' => now()
                    ]);

                    Anggota::where('anggota_user_id',$id)->update([
                        'tgl_lahir' => $request->tgl_lahir,
                        'alamat' => $request->alamat,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'umur' => now()->format('Y') - Carbon::parse($request->tgl_lahir)->format('Y'),
                        'updated_at' => now(),
                    ]);

                    return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil Update Data Pengguna.');
                }
            }
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
        //
    }
}
