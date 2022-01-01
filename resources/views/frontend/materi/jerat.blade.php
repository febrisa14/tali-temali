@extends('components/frontend/app')

@section('content')

    <!-- Blog  Area -->
    <div class="inner-service-banner">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-7 col-xl-8 col-lg-10 col-md-10">
            <div class="section-heading-14 text-center">
            <h2>Materi Jerat</h2>
              <p>Kumpulan materi pembelajaran mengenai jenis-jenis jerat pada tali temali.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Blog Content Area -->
    <div class="blog-category-area blog-regular-area">
      <div class="container">
        <div class="row blog-regular-items">
          @forelse ($jerat as $jerat)
          <div class="col-lg-4 col-md-6">
            <div class="blog-card">
              <div class="blog-image">
                <a href="{{ route('lihat-materi-jerat',['slug' => $jerat->slug ]) }}"><img class="w-100" src="{{ asset('/cover/'.$jerat->cover_photo) }}" alt=""></a>
              </div>
              <div class="blog-content">
                <a href="{{ route('materi-jerat') }}">
                  <h6>{{$jerat->kategori}}</h6>
                </a>
                <a href="{{ route('lihat-materi-jerat',['slug' => $jerat->slug ]) }}">
                  <h4>{{$jerat->judul}}</h4>
                </a>
              </div>
            </div>
          </div>
          @empty
          <div class="section-heading-14 text-center">
              <p>~ Tidak Ada Materi Yang Tersedia ~</p>
          </div>
          @endforelse
        </div>

      </div>
    </div>
    
@stop