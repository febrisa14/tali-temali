<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend/index', [
            'title' => 'Beranda | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    public function jenis()
    {
        return view('frontend/index', [
            'title' => 'Beranda | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }
}
