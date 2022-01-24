@extends('components/frontend/app')

@section('content')

  <!-- Contact Area -->
  <div class="topics-area-l-12 position-relative overflow-hidden">
    <div class="contact-l3-image-group">
      <div class="image-1 d-none d-md-block" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
        <img class="vertical-move" src="{{ url('assets/image/landing-3/con-shape-1.png') }}" alt="image">
      </div>
      <div class="image-2 d-none d-lg-block" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
        <img class="spin" src="{{ url('assets/image/landing-3/con-shape-2.png') }}" alt="image">
      </div>
      <div class="image-3 d-none d-lg-block" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
        <img class="spin" src="{{ url('assets/image/landing-3/con-shape-3.png') }}" alt="image">
      </div>
      <div class="image-4 d-none d-md-block" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
        <img class="horizontal-move" src="{{ url('assets/image/landing-3/con-shape-4.png') }}" alt="image">
      </div>
      <div class="image-5 d-none d-lg-block" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000">
        <img class="spin" src="{{ url('assets/image/landing-3/con-shape-5.png') }}" alt="image">
      </div>
      <div class="image-6 d-none d-md-block" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
        <img class="vertical-move" src="{{ url('assets/image/landing-3/con-shape-6.png') }}" alt="image">
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
          <div class="sign-in-1-box justify-content-lg-end">
            <div class="section__heading-3 text-center">
              <h2>Form Register</h2>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Masukan email anda">
              </div>
              <div class="form-group">
                <label>No. CA</label>
                <input type="text" name="no_ca" class="form-control" placeholder="Masukan No. CA anda">
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukan Nama Lengkap anda">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password anda">
              </div>
              <div class="sign-in-log-btn">
                <button class="btn btn btn-style-03 focus-reset">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop
