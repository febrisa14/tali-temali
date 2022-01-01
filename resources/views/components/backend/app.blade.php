<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ url('assets/image/favicon.png') }}" type="image/x-icon">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('assets/oneui/js/plugins/magnific-popup/magnific-popup.css') }}">

        <!-- DatePicker CSS -->
        <link rel="stylesheet" href="{{ url('assets/oneui/js/plugins/flatpickr/flatpickr.min.css') }}">

        <!-- SweetAlert CSS -->
        <link rel="stylesheet" href="{{ url('assets/oneui/js/plugins/sweetalert2/sweetalert2.min.css') }}">

        <!-- Datatables CSS -->
        <link rel="stylesheet" href="{{ url('assets/oneui/js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ url('assets/oneui/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

        <!-- IziToast -->
        <link rel="stylesheet" href="{{ url('assets/oneui/js/plugins/iziToast/iziToast.min.css') }}">

        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="{{ url('assets/oneui/fonts/Inter/font-face.css') }}">

        <link rel="stylesheet" id="css-main" href="{{ url('assets/oneui/css/oneui.min.css') }}">
       
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-light enable-page-overlay side-scroll page-header-fixed main-content-narrow">

        @include('/components/backend/sidebar')

        @include('/components/backend/header')

        @yield('content')

        @include('/components/backend/footer')

        </div>
        <!-- END Page Container -->

        <script src="{{ url('assets/oneui/js/oneui.core.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/oneui.app.min.js') }}"></script>

        <script src="{{ url('assets/oneui/js/plugins/iziToast/iziToast.min.js') }}"></script>

        <!-- SweetAlert JS Plugins -->
        <script src="{{ url('assets/oneui/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Datatables Plugins -->
        <script src="{{ url('assets/oneui/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
        <script src="{{ url('assets/oneui/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

        <script src="{{ asset('assets/oneui/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

        <!-- Flatpickr JS Plugins -->
        <script src="{{ url('assets/oneui/js/plugins/flatpickr/flatpickr.js') }}"></script>

        <!-- CKEDITOR 5 -->
        <script src="{{ url('assets/oneui/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>

        <!-- Page JS Helpers (jQuery Sparkline Plugins) -->
        <script>
            jQuery(function () {
                One.helpers(['flatpickr','magnific-popup']);
            });
        </script>

        @stack('scripts')

    </body>
</html>
