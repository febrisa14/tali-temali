@extends('components/backend/app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Tambah Data Materi
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.materi.index') }}">Materi</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah Materi</li>
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
                    <h2 class="content-heading border-bottom mb-4 pb-2">Informasi Materi</h2>
                    <form action="{{ route('admin.materi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row items-push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Judul Materi</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Materi...">
                            </div>
                            <div class="form-group">
                                <label>URL Video Youtube</label>
                                <input type="text" class="form-control" id="url_video" name="url_video" placeholder="Masukan URL Video Youtube...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="custom-select" id="kategori" name="kategori">
                                    <option value="">- Pilih -</option>
                                    <option value="Simpul">Simpul</option>
                                    <option value="Jerat">Jerat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cover Foto</label>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="cover_photo" name="cover_photo">
                                    <label class="custom-file-label">Input foto disini...</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" id="ckeditor" name="deskripsi" placeholder="Masukan Isi Materi..."></textarea>
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

<script>
class MyUploadAdapter {
    constructor( loader ) {
        this.loader = loader;
    }
 
    upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
    }
 
    abort() {
        if ( this.xhr ) {
            this.xhr.abort();
        }
    }
 
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();
 
        xhr.open( 'POST', "{{route('admin.upload', ['_token' => csrf_token() ])}}", true );
        xhr.responseType = 'json';
    }
 
    _initListeners( resolve, reject, file ) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${ file.name }.`;
 
        xhr.addEventListener( 'error', () => reject( genericErrorText ) );
        xhr.addEventListener( 'abort', () => reject() );
        xhr.addEventListener( 'load', () => {
            const response = xhr.response;
 
            if ( !response || response.error ) {
                return reject( response && response.error ? response.error.message : genericErrorText );
            }
 
            resolve( response );
        } );
 
        if ( xhr.upload ) {
            xhr.upload.addEventListener( 'progress', evt => {
                if ( evt.lengthComputable ) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            } );
        }
    }
 
    _sendRequest( file ) {
        const data = new FormData();
 
        data.append( 'upload', file );
 
        this.xhr.send( data );
    }
}
 
function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}
 
ClassicEditor
    .create( document.querySelector( '#ckeditor' ), {
        extraPlugins: [ MyCustomUploadAdapterPlugin ],
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

@endpush
