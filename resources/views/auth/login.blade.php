@extends('components/frontend/app')

@section('content')

    <!-- Sign In Area -->
    <div class="sign-in-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-8 position-static d-none d-lg-block">
            <div class="inner-page-left-bg">
              <img src="{{ url('assets/image/scout-rope.jpg') }}" alt="">
            </div>
          </div>
          <div class="col-lg-5 col-md-8">
            <div class="sign-in-3-box justify-content-lg-end">
              <div class="heading">
                <h2>Log in</h2>
                <p>Masukan detail akun anda</p>
              </div>
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Email*</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="ex: john@email.com">
                </div>
                <div class="form-group">
                  <label>Password*</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="i.e. IAmthepreciouspass123 ">
                </div>
                <div class="keep-sign-area">
                  <div class="check-form d-inline-block">
                    <!-- <label for="terms-check" class="check-input-control d-flex align-items-center mb-0">
                      <input class="d-none" type="checkbox" id="terms-check">
                      <span class="checkbox checkbox-2 rounded-check-box "></span>
                      <span class="remember-text">Keep me signed in</span>
                    </label> -->
                  </div>
                </div>
                <div class="sign-in-log-btn">
                  <button type="submit" class="btn btn-style-03 focus-reset">Masuk</button>
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

@endif

@endpush
