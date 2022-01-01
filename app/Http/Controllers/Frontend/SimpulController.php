<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class SimpulController extends Controller
{
    public function index()
    {
        $simpul = Materi::latest()->where('kategori','=','Simpul')->get();

        return view('frontend/materi/simpul', [
            'title' => 'Materi Simpul | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'simpul' => $simpul
        ]);
    }

    public function show($slug)
    {
        $detail_materi = Materi::select('materi_id','judul','deskripsi','cover_photo','url_video')->where('slug',$slug)->first();
        
        return view('frontend/materi/detail_materi',[
            'title' => 'Detail Materi | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'detail_materi' => $detail_materi
        ]);
    }
}
