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
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
            <div class="sign-in-1-box justify-content-lg-end">
                <div class="section__heading-3 text-center">
                    <h2>Log in</h2>
                </div>
                <form action="{{ route('login') }}" method="POST">
                @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email anda">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password anda">
                  </div>
                  {{-- <div class="keep-sign-area">
                    <div class="check-form d-inline-block">
                      <label for="terms-check" class="check-input-control d-flex align-items-center mb-0">
                        <input class="d-none" type="checkbox" id="terms-check">
                        <span class="checkbox checkbox-2 rounded-check-box "></span>
                        <span class="remember-text">Keep me signed in</span>
                      </label>
                    </div>
                  </div> --}}
                  <div class="sign-in-log-btn">
                    <button class="btn btn btn-style-03 focus-reset">Masuk</button>
                  </div>
                  <div class="create-new-acc-text text-center">
                    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                  </div>
                </form>
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

{{-- @if ($message = Session::get('failed'))
<script>
iziToast.warning({
    title: 'Login Gagal',
    message: '{{$message}}',
    position: 'bottomRight'
});
</script>
@endif --}}

<!-- iziToast Error Tampil -->
@if ($errors->any)
    @foreach ($errors->all() as $message)
    <script>
        iziToast.error({
            title: 'Login Gagal',
            message: '{{ $message }}',
            position: 'bottomRight',
        });
    </script>
    @endforeach
@endif

@if ($message = Session::get('failed'))
<script>
iziToast.warning({
    title: 'Login Gagal',
    message: '{{$message}}',
    position: 'bottomRight'
});
</script>

@endIf

@if ($message = Session::get('login'))
<script>
iziToast.warning({
    title: 'Error',
    message: '{{$message}}',
    position: 'bottomRight'
});
</script>

@endif

@endpush
