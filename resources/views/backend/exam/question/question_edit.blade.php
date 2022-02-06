@extends('components/backend/app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ubah Data Pertanyaan
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.question.index',$question->quiz_id) }}">Question</a></li>
                        <li class="breadcrumb-item" aria-current="page">Ubah Pertanyaan</li>
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
                    <form action="{{ route('admin.question.update',$question->question_id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="row items-push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Nama Pertanyaan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="question" value="{{$question->question}}" placeholder="Masukan Pertanyaan...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            {{-- <div class="form-group">
                                <label>Nama Quiz</label>
                                <input type="hidden" class="form-control" name="quiz_id" value="{{$question->quiz_id}}">
                                <span class="form-control">{{$quiz->quiz_name}}</span>
                            </div> --}}
                        </div>
                        @foreach ($question->optionsdata as $key=>$option)
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Jawaban Option {{++$key}} <span class="text-danger">*</span></label>
                                <input type="hidden" name="option_id[]" value="{{$option->option_id}}">
                                <input type="text" class="form-control" name="option[]" value="{{$option->option}}">
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Jawaban Yang Benar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="answer" value="{{$question->answer}}" placeholder="Masukan Jawaban Yang Benar...">
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
