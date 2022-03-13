@extends('components/frontend/app')

@section('content')

<!-- Service Area -->
<div class="inner-career-banner">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-8 col-lg-10 col-md-10">
          <div class="section-heading-14 text-center">
            <h2>{{$judul}}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inner career details Area -->
  <div class="inner-career-details-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-12">
          <h4>Pengertian :</h4>
          <p>{{$pengertian}}</p>
          <img src="{{$gambar}}" alt="" class="w-100">
          <h4>Download Materi</h4>
          <p>Jika ingin membaca materi lebih lanjut, anda dapat mendownload melalui button dibawah ini.</p>
          <div class="cd-apply-btn">
            <a href="{{$link}}" class="btn focus-reset">Download (PDF)</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @includeWhen(Request::is('kurikulum/rock-climbing'), '/frontend/kurikulum/talitemali')

@stop
