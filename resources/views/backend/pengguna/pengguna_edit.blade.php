@extends('components/backend/app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ubah Data Pengguna
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.pengguna.index') }}">Pengurus</a></li>
                        <li class="breadcrumb-item" aria-current="page">Ubah Pengurus</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <h2 class="content-heading border-bottom mb-4 pb-2">Informasi Akun</h2>
                    <form action="{{ route('admin.pengguna.update',$user->user_id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="row items-push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email.." value="{{ $user->email }}">
                                {{-- <small class="form-text text-muted">Contoh: contoh@gmail.com</small> --}}
                            </div>
                            <!-- <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password..">
                            </div> -->
                            <div class="form-group">
                                <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Lengkap..." value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No. Telp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan No. Telp ..." value="{{ $user->no_telp }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tgl_lahir" name="tgl_lahir" placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ $user->tgl_lahir }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option {{ $user->jenis_kelamin == "Laki - Laki" ? 'selected' : ''}} value="Laki - Laki">Laki - Laki</option>
                                    <option {{ $user->jenis_kelamin == "Perempuan" ? 'selected' : ''}} value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Role <span class="text-danger">*</span></label>
                                <select class="custom-select" id="role" name="role">
                                    <option {{ $user->role == "Pengurus" ? 'selected' : ''}} value="Pengurus">Pengurus</option>
                                    <option {{ $user->role == "Anggota" ? 'selected' : ''}} value="Anggota">Anggota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Lengkap...">{{ $user->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- END Regular -->
                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-8 offset-lg-5">
                            <button type="submit" data-toggle="click-ripple" class="btn btn-primary">
                                <i class="fa fa-save mr-1"></i> Update
                            </button>
                        </div>
                    </div>
                    <!-- END Submit -->
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop

@push('scripts')

<!-- Script Success SweetAlert2 -->
@if (Session::has('success'))
<script>
    Swal.fire('Success', '{{ Session::get('success') }}' ,'success');
</script>
@endif

<!-- Script Error SweetAlert2 -->
@if (Session::has('error'))
<script>
    Swal.fire('Error', '{{ Session::get('error') }}' ,'error');
</script>
@endif

<!-- iziToast Error Tampil -->
@if ($errors->any)
    @foreach ($errors->all() as $message)
    <script>
        iziToast.error({
            title: 'Error',
            message: '{{ $message }}',
            position: 'bottomRight',
        });
    </script>
    @endforeach
@endif

@endpush
