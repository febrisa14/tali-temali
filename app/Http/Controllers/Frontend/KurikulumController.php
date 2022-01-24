<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        return view('frontend/kurikulum/index', [
            'title' => 'Kurikulum | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    public function mountenering()
    {
        return view('frontend/kurikulum/detail', [
            'title' => 'Mountenering | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'judul' => 'Mountenering',
            'pengertian' => 'Mountaineering adalah salah satu dari kegiatan di alam bebas yang biasa dilakukan di
            gunung. Tetapi dalam perkembangan dan pengembangannya, kegiatan ini sering
            dilakukan dalam pemanjatan tebing dan jelajah rimba.',
            'link' => 'https://drive.google.com/uc?export=download&id=1uZuQUgNkxLe0jTAnYzSx123OHxP-8zR8'
        ]);
    }

    public function navigasidarat()
    {
        return view('frontend/kurikulum/detail', [
            'title' => 'Navigasi Darat | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'judul' => 'Navigasi Darat',
            'pengertian' => 'Navigasi adalah suatu teknik menentukan kedudukan dan arah perjalanan secara
            tepat. Penambahan kata Darat berarti penggunaannya navigasi tersebut di darat, yang
            meliputi gunung, hutan, sungai dan sebagainya.
            Alat-alat bantu yang di gunakan dalam kegiatan ini minimal kompas dan peta.',
            'link' => 'https://drive.google.com/uc?export=download&id=1VRM7ezPrL0nBHGJd_m6aDp0AqZ-Othly'
        ]);
    }

    public function rockclimbing()
    {
        return view('frontend/kurikulum/detail', [
            'title' => 'Rock Climbing | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'judul' => 'Rock Climbing',
            'pengertian' => 'ROCK = Batu
            CLIMBING = Memanjat
            ROCK CLIMBING artinya, memanjat dinding batu alam dengan memanfaatkan
            Crack (Cacat Batuan) berupa rekahan-rekahan pada tebing, batuan tembus, batu
            bertanduk dll.
            Panjat tebing atau istilah asingnya dikenal dengan Rock Climbing merupakan
            salah satu dari sekian banyak olah raga alam bebas dan merupakan salah satu bagian
            dari mendaki gunung yang tidak bisa dilakukan dengan cara berjalan kaki melainkan
            harus menggunakan peralatan dan teknik-teknik tertentu untuk bisa melewatinya.
            Pada umumnya panjat tebing dilakukan pada daerah yang berkontur batuan tebing
            dengan sudut kemiringan mencapai lebih dari 45 derajat dan mempunyai tingkat
            kesulitan tertentu.
            Pada dasarnya olah raga panjat tebing adalah suatu olah raga yang mengutamakan
            kelenturan, kekuatan / daya tahan tubuh, kecerdikan, kerja sama team serta
            keterampilan dan pengalaman setiap individu untuk menyiasati tebing itu sendiri.
            Dalam menambah ketinggian dengan memanfaatkan cacat batuan maupun rekahan /
            celah yang terdapat ditebing tersebut serta pemanfaatan peralatan yang efektif dan
            efisien untuk mencapai puncak pemanjatan.
            ',
            'link' => 'https://drive.google.com/uc?export=download&id=1wsppjun8YOmmX9taLRRuDOyy_HNNmiij'
        ]);
    }

    public function survival()
    {
        return view('frontend/kurikulum/detail', [
            'title' => 'Survival | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'judul' => 'Survival',
            'pengertian' => 'Survival adalah berusaha mempertahankan hidup di alam bebas. Survival
            berasal dari kata Survive, yang artinya bertahan hidup. Survival merupakan suatu
            kondisi yang tidak menentu yang dihadapi oleh seorang atau sekelompok orang
            pada suatu daerah yang asing dan bagi orang/kelompok yang sedang mengalami
            Keadaan tidak menentu. Survival bisa terjadi pada setiap orang yang melakukan
            perjalanan, petualangan atau penjelajahan di alam bebas. Banyak hal yang harus
            diketahui dan di pelajari, sebelum kejadian yang akan terjadi itu benar-benar
            terjadi.
            Pemanfaatan sarana yang ada menjadi obyek untuk bertahan hidup. Dibutuhkan
            untuk menguasai beberapa tehnik. Pengetahuan tentang Botani, Ekologi, Zoology,
            Navigasi darat , Rasi bintang sangat penting menunjang. Apa yang ada di alam
            atau hutan tidak semua bisa menjadi bahan makanan yang kita makan.
            ',
            'link' => 'https://drive.google.com/uc?export=download&id=14oSsrwbF4zC3dUPUIlY83dAwIwXdBgM9'
        ]);
    }
}
