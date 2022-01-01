@extends('components/frontend/app')

@section('content')

<div class="hero-area-l-12 position-relative z-index-1 overflow-hidden">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12 order-lg-1 order-1" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <div class="content">
              <h1>{{$detail_materi->judul}}</h1>
              <p>Materi pembelajaran mengenai {{$detail_materi->judul}}
              </p>
              <a href="#" class="btn focus-reset">Get Started</a>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5 col-md-8 order-lg-1 order-0" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
            <div class="hero-video-l12 position-relative text-center">
              <img src="{{ asset('/cover/'.$detail_materi->cover_photo) }}" alt="" class="w-100">
              <a data-fancybox="" href="{{$detail_materi->url_video}}">
                <div class="d-inline-block video-icon d-inline-block">
                  <i class="fas fa-play align-center"></i>
                </div>
              </a>
              <div class="video-area-shape-l-12">
                <img src="{{ url('assets/image/l6/shape-2.svg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-shape-l12-1 d-none d-sm-block">
        <img src="{{ url('assets/image/l6/shape-1.png') }}" alt="">
      </div>
      <div class="hero-shape-l12-2 d-none d-sm-block">
        <img src="{{ url('assets/image/l6/shape-3.png') }}" alt="">
      </div>
</div>

<!-- Inner career details Area -->
<div class="inner-career-details-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-12">
            <p>{!!$detail_materi->deskripsi!!}</p>
          </div>
        </div>
      </div>
    </div>

@stop