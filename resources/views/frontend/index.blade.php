@extends('components/frontend/app')

@section('content')

    <!-- Hero Area -->
    <div class="hero-area-l7 background-property" style="background: url({{ url('assets/image/hero-bg.jpg') }});">
      <div class="container">
        <div class="bg-overlay" style="border-radius: 0.8rem; opacity: 0.6;"></div>
          <div class="row align-items-center justify-content-lg-start justify-content-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-10 order-lg-1 order-1" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000">
              <div class="hero-l7-content">
                <h2>Sistem Informasi Pembelajaran Tali Temali</h2>
                <p>Tali Temali adalah salah satu seni menyambung tali dengan menggunakan simpul-simpul sehingga membentuk suatu alat atau benda lain yang bermanfaat.</p>
                {{-- <div class="price-l6-btn">
                    <a href="#" class="btn btn-style-03 focus-reset">Learn More</a>
                </div> --}}
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- About Us  Area -->
    <div class="inner-about-us-area" id="mapala-kompas">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10">
            <div class="section__heading-3 text-center">
                <h6 style="color: #325288;">Tentang</h6>
                <h2>UKM Mapala Kompas</h2>
              <p style="font-size: 1rem; text-align: justify;">Mapala Kompas Stikom Bali adalah organisasi kemahasiswaan ekstrakurikuler di Stikom Bali yang bergerak di bidang kepecintaalaman, sosial dan non politik. Organisasi Mahasiswa Pecinta Alam Stikom Bali ini turut ikut serta dan berperan aktif di dalam kegiatan Petualangan alam bebas dan kelestarian alam. Organisasi ini berasaskan musyawarah, kekeluargaan, kemandirian, persaudaraan dan kebersamaan yang kuat dan didasari TRI HITA KARANA yaitu hubungan harmonis antara Manusia dengan TUHAN, Manusia dengan Alam lingkungannya, dan Manusia dengan Manusia. Tanpa ada intervensi dari organisasi politik yang berkepentingan di dalamnya. </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-about-bg-area">
              <div class="bg-image">
                <img class="w-100" src="{{ url('assets/image/ukm-mapala.jpg') }}" alt="image">
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center inner-ab-bg-bottom-content">
          <div class="col-lg-6 col-md-10 col-sm-10">
            <div class="icon-content-area d-md-flex align-items-center text-center text-md-start">
              <div class="icon">
                <img src="{{ url('assets/image/landing-5/heart1.svg') }}" alt="image">
              </div>
              <div class="content">
                <p>Organisasi ini bertujuan untuk menumbuhkan, memupuk, membina dan mengembangkan penalaran mahasiswa sebagai insan intelektual yang menunjang kelestarian alam dan lingkungan beserta segenap isinya sebagai pernyataan rasa cinta terhadap Tuhan sebagai pencipta.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-10 col-sm-10">
            <div class="icon-content-area d-md-flex align-items-center text-center text-md-start">
              <div class="icon icon-2">
                <img src="{{ url('assets/image/landing-5/zap1.svg') }}" alt="image">
              </div>
              <div class="content">
                <p>Organisasi ini bertujuan juga untuk membina fisik dan mental dalam mengembangkan kepribadian mahasiswa pecinta alam yang terampil dan berbudi pekerti luhur</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Content Area 1-->
    <div class="content-area-l-18-2">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-xl-12 col-lg-12" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
            <div class="content section__heading-3">
              <h6 style="color: #325288;">Sejarah</h6>
              <h2>UKM Mapala Kompas</h2>
              <p style="font-size: 1rem;">UKM Mapala Kompas STIKOM Bali merupakan organisasi mahasiswa pecinta alam di STIKOM Bali. Terbentuknya ukm mapala kompas melalui serangkaian kegiatan yang dilakukan mahasiswa. Salah satunya pada tahun 2009 terjadi sebuah moment penting yaitu pada tanggal 20 September dilakukan kegiatan pendakian ke Gunung Batur-Bali sebagai awal kegiatan yang terdiri 6 orang mahasiswa STMIK STIKOM BALI . Tanggal 20 September 2009 selanjutnya disebut hari Kebangkitan UKM Mapala Kompas Stikom Bali. UKM ini disahkan pada bulan Juni tahun 2010 dan awalnya bernama UKM Kompas Bali. Hingga kini Mapala Kompas hadir sebagai tempat berkumpul dan berorganisasi bagi mahasiswa pecinta alam di kampus STIKOM Bali.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Area 3-->
    <div class="content-area-l6-3">
        <div class="container">
          <div class="row align-items-center justify-content-center justify-content-lg-start">
            <div class="offset-xxl-1 col-xxl-4 col-xl-5 col-lg-5 col-md-8 order-2 order-lg-1" data-aos="fade-right" data-aos-delay="500" data-aos-duration="1000">
              <div class="content-box-l6-3 section__heading-3 text-lg-start text-center">
                <h6 style="color: #325288;">Logo</h6>
                <h2>UKM Mapala Kompas</h2>
                <p><b>Arti Logo</b></p>
                <p style="text-align: left;">1. Jarum Penunjuk Arah pada kompas diartikan sebagai penuntun agar Mapala Kompas Stikom Bali selalu menuju ke arah yang baik dan benar.<br/>2. Empat penjuru arah mata angin dengan Jarum Penunjuk Arah memiliki arti bahwa tujuan organisasi, bersifat fleksibel dalam mengikuti perkembangan kegiatan kepecintaalaman.<br/>3. Lingkaran diartikan sebagai garis organisasi yang berkesinambungan.
                </p><br/>
                <p><b>Arti Warna</b></p>
                <p style="text-align: left;">1. Warna Merah pada Jarum Penunjuk Arah diartikan sebagai keberanian dan semangat untuk mengambil tindakan demi mencapai tujuan bersama.<br/>2. Warna putih didalam lingkaran melambangkan kesucian, bahwa setiap tindakan didasari atas kebersihan hati.<br/>3. Warna hitam pada lingkaran diartikan sebagai kekompakan setiap anggota untuk menjalankan roda organisasi.</p>
              </div>
            </div>
            <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 col-md-9 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="700" data-aos-duration="1000">
              <div class="content-image-group-l6-3 position-relative text-center">
                <div class="bg-image">
                  <img src="{{ url('assets/image/landing-6/content-2-bg.png') }}" alt="image">
                </div>
                <div class="main-image-group">
                  <div class="image-1">
                    <img src="{{ url('assets/image/logo.png') }}" alt="image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!--Pricing Area-->
    <div class="pricing-area-l-16 position-relative overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center" data-aos="fade-down" data-aos-duration="800" data-aos-once="true">
                    <div class="content section__heading-3">
                        <h6 style="color: #325288;">Struktur Organisasi</h6>
                        <h2>UKM Mapala Kompas</h2>
                        <p>Berikut merupakan bagan dari struktur organisasi UKM Mapala Kompas Stikom Bali</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-9 order-lg-1 order-0">
                    <div class="hero-area-image">
                      <img src="{{ url('assets/image/struktur.jpg') }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')

@if ($message = Session::get('success'))
<script>
    iziToast.success({
        title: 'Success',
        message: '{{$message}}',
        position: 'topCenter'
    });
</script>
@endif

@endpush
