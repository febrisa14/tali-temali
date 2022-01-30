@extends('components/backend/app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Tambah Data Quiz
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.quiz.index') }}">Quiz</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah Quiz</li>
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
                    <h2 class="content-heading border-bottom mb-4 pb-2">Informasi Quiz</h2>
                    <form action="{{ route('admin.quiz.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row items-push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Nama Quiz <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="quiz_name" placeholder="Masukan Nama Quiz...">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pertanyaan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="number_of_question" placeholder="Masukan Jumlah Pertanyaan Quiz...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Tanggal Quiz <span class="text-danger">*</span></label>
                                <input type="text" class="js-flatpickr form-control bg-white" name="quiz_date" placeholder="d-m-Y" data-date-format="d-m-Y">
                            </div>
                            <div class="form-group">
                                <label>Waktu Quiz <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}" name="quiz_time" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" id="ckeditor" name="description" placeholder="Masukan Isi Deskripsi..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- END Regular -->
                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-8 offset-lg-5">
                            <button type="submit" data-toggle="click-ripple" class="btn btn-primary">
                                <i class="fa fa-save mr-1"></i> Simpan
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
