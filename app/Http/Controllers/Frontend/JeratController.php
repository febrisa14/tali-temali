<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class JeratController extends Controller
{
    public function index()
    {
        $jerat = Materi::latest()->where('kategori','=','Jerat')->get();

        return view('frontend/materi/jerat', [
            'title' => 'Materi Jerat | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'jerat' => $jerat
        ]);
    }

    public function show($slug)
    {
        $detail_materi = Materi::select('materi_id','judul','deskripsi','cover_photo','url_video')->where('slug',$slug)->first();
        
        return view('frontend/materi/detail_materi',[
            'title' => "$detail_materi->judul | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali",
            'detail_materi' => $detail_materi
        ]);
    }
}
