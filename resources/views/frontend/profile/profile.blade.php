@extends('components/backend/app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content content-boxed">

        <!-- Billing Information -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Informasi Akun</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('anggota.change_profile') }}" method="POST">
                    @csrf
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Anda dapat mengupdate informasi akun apabila terdapat kekeliruan dalam pengisian data.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2">{{ $users->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
                            </div>
                            <div class="form-group">
                                <label>No. CA</label>
                                {{-- <input type="text" class="form-control" id="no_ca" name="no_ca" value="{{ $users->no_ca }}"> --}}
                                <span class="form-control">{{ $users->no_ca }}</span>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No. Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $users->no_telp }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tgl_lahir" name="tgl_lahir" placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ $users->tgl_lahir }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option {{ $users->jenis_kelamin == "Laki - Laki" ? 'selected' : ''}} value="Laki - Laki">Laki - Laki</option>
                                    <option {{ $users->jenis_kelamin == "Perempuan" ? 'selected' : ''}} value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" data-toggle="click-ripple" class="btn btn-alt-primary">
                                    <i class="fa fa-save mr-1"></i> Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Billing Information -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Ganti Password</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('change_password') }}" method="POST">
                    @csrf
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Pastikan selalu menggunakan password dengan kombinasi yang rumit dan rahasia agar akun lebih aman.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" class="form-control" id="password_lama" name="password_lama">
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" id="password_baru" name="password_baru">
                                    <small class="form-text text-muted">Password Minimal 8 Karakter</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="one-profile-edit-password-new-confirm">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="konfirmasi_password_baru" name="konfirmasi_password_baru">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" data-toggle="click-ripple" class="btn btn-alt-primary">
                                    <i class="fa fa-save mr-1"></i> Update Password
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Change Password -->

    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop

@push('scripts')

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

@endpush
