@extends('components/frontend/app')

@section('content')

<!-- Features Area -->
<div class="feature-area-l2">
    <div class="container">
      <div class="row justify-content-lg-between justify-content-center align-items-center text-center text-lg-start">
        <div class="col-xl-4 col-lg-5 col-md-8">
          <div class="section__heading-3">
            <h2>Explore Materi</h2>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-8">
          <div class="content">
            <p>Berikut merupakan kumpulan materi yang dapat kamu pelajari.</p>
          </div>
        </div>
      </div>
      <div class="row feature-l2-items justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
          <div class="feature-box-l2 h-100">
            <div class="d-flex">
              <div class="color-box bg-java"></div>
                <a href="{{ route('mountenering') }}">
                <div class="content-box">
                    <h4>Mountenering</h4>
                    <p>Lihat Selengkapnya</p>
                </div>
                </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
          <div class="feature-box-l2 h-100">
            <div class="d-flex">
              <div class="color-box bg-secondary"></div>
              <a href="{{ route('navigasidarat') }}">
                <div class="content-box">
                    <h4>Navigasi Darat</h4>
                    <p>Lihat Selengkapnya</p>
                </div>
                </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
          <div class="feature-box-l2 h-100">
            <div class="d-flex">
              <div class="color-box bg-primary"></div>
              <a href="{{ route('rockclimbing') }}">
                <div class="content-box">
                    <h4>Rock Climbing</h4>
                    <p>Lihat Selengkapnya</p>
                </div>
                </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
          <div class="feature-box-l2 h-100">
            <div class="d-flex">
              <div class="color-box bg-sunglow"></div>
              <a href="{{ route('survival') }}">
                <div class="content-box">
                    <h4>Survival</h4>
                    <p>Lihat Selengkapnya</p>
                </div>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop
