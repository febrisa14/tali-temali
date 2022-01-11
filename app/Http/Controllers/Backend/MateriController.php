<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Materi;
use App\Http\Requests\MateriRequest;
use Str;
use Image;
use File;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Materi::select('materi_id', 'judul', 'kategori')
                ->orderBy('materi.created_at', 'DESC')
                ->get();

                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = ' <a href="/admin/materi/'. $data->materi_id .'/edit" class="editdata btn btn-sm btn-alt-success" data-toggle="tooltip" title="Edit Data"><i class="fa fa-fw fa-edit"></i> Ubah</a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" class="delete btn btn-sm btn-alt-danger" data-id="' . $data->materi_id . '" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend/materi/materi_index', [
            'title' => 'List Materi | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/materi/materi_add', [
            'title' => 'Tambah Data Materi | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriRequest $request)
    {
        if ($request->hasFile('cover_photo'))
        {
            $thumbnail = $request->file('cover_photo');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('cover'),$filename);
            $img = Image::make(public_path('cover/'.$filename))->fit('416','250');
            $img->save();
        }

        Materi::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul),
            'url_video' => $request->url_video,
            'cover_photo' => $filename,
        ]);

        return redirect()->route('admin.materi.index')->with('success', 'Berhasil Menambahkan Materi.');
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
        $materi = Materi::select('materi_id','judul','kategori','deskripsi','url_video','cover_photo')
        ->where('materi_id',$id)->first();

        return view('backend/materi/materi_edit', [
            'title' => 'Edit Data Materi | Sistem Informasi Sekaa Teruna Dharma Gargitha',
            'materi' => $materi
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
            'judul' => 'required|min:5',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'url_video' => 'required'
        ]);

        $materi = Materi::select('materi_id','judul','kategori','deskripsi','url_video','cover_photo')
        ->where('materi_id',$id)->first();

        if ($request->hasFile('cover_photo'))
        {
            $this->validate($request, [
                'cover_photo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            File::delete('cover/'.$materi->cover_photo);
            $thumbnail = $request->file('cover_photo');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('cover'),$filename);
            $img = Image::make(public_path('cover/'.$filename))->fit('416','250');
            $img->save();
        }

        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->kategori = $request->kategori;
        $materi->url_video = $request->url_video;
        $materi->cover_photo = $request->hasFile('cover_photo') ? $filename : $materi->cover_photo;

        if ($materi->isDirty())
        {
            if ($request->hasFile('cover_photo'))
            {
                Materi::where('materi',$id)->update([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'kategori' => $request->kategori,
                    'url_video' => $request->url_video,
                    'slug' => Str::slug($request->judul),
                    'cover_photo' => $filename,
                    'updated_at' => now()
                ]);
            }

            Materi::where('materi_id',$id)->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'slug' => Str::slug($request->judul),
                'url_video' => $request->url_video,
                'updated_at' => now()
            ]);

            return redirect()->route('admin.materi.index')->with('success', 'Berhasil Update Materi.');
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
        Materi::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Materi'
        ]);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $request->file('upload')->storeAs('public/uploads/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/uploads/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(306, 340, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

            echo json_encode([
                'default' => asset('storage/uploads/'.$filenametostore),
                '500' => asset('storage/uploads/thumbnail/'.$filenametostore)
            ]);
        }
    }
}
