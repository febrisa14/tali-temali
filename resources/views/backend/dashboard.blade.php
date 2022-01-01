@extends('components/backend/app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="h3 font-w700 mb-2">
                            Admin Dashboard
                        </h1>
                        <h2 class="h6 font-w500 text-muted mb-0">
                            Selamat Datang, <strong>{{ Auth::user()->name }}</strong>.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        

    </main>
    <!-- END Main Container -->
@endsection