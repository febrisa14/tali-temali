@extends('components/backend/app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Tambah Data Pertanyaan
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.question.index',$quiz->quiz_id) }}">Question</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah Pertanyaan</li>
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
                    <h2 class="content-heading border-bottom mb-4 pb-2">Informasi Pertanyaan</h2>
                    <form action="{{ route('admin.question.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row items-push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Nama Quiz</label>
                                <input type="hidden" class="form-control" name="quiz_id" value="{{$quiz->quiz_id}}">
                                <span class="form-control">{{$quiz->quiz_name}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Nama Pertanyaan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="question" placeholder="Masukan Pertanyaan...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Jawaban Option 1 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="option[]" placeholder="Masukan Jawaban Option 1...">
                            </div>
                            <div class="form-group">
                                <label>Jawaban Option 2 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="option[]" placeholder="Masukan Jawaban Option 2...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Jawaban Option 3 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="option[]" placeholder="Masukan Jawaban Option 3...">
                            </div>
                            <div class="form-group">
                                <label>Jawaban Option 4 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="option[]" placeholder="Masukan Jawaban Option 4...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Jawaban Yang Benar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="answer" placeholder="Masukan Jawaban Yang Benar...">
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
