<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>

  <link rel="shortcut icon" href="{{ url('assets/image/favicon.png') }}" type="image/x-icon">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ url('assets/fonts/icon-font/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/fonts/typography-font/typo.css') }}">
  <link rel="stylesheet" href="{{ url('assets/fonts/fontawesome-5/css/all.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" href="{{ url('assets/plugins/aos/aos.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/fancybox/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/nice-select/nice-select.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/slick/slick.min.css') }}">
  <!-- Vendor stylesheets  -->
  <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
  <!-- Custom stylesheet -->
  <!-- IziToast -->
  <link rel="stylesheet" href="{{ asset('assets/oneui/js/plugins/iziToast/iziToast.min.css') }}">
  <script src="{{ asset('assets/oneui/js/plugins/iziToast/iziToast.min.js') }}"></script>

  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="{{ asset('assets/oneui/js/plugins/sweetalert2/sweetalert2.min.css') }}">

</head>

<body data-theme-mode-panel-active data-theme="light" style="font-family: 'Mazzard H';">
  <div class="site-wrapper overflow-hidden position-relative">

    @include('/components/frontend/header')

    @yield('content')

    @include('/components/frontend/footer')

  </div><!-- site wrapper end -->
  <!-- Vendor Scripts -->
  <script src="{{ url('assets/js/vendor.min.js') }}"></script>
  <!-- Plugin's Scripts -->
  <script src="{{ url('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
  <script src="{{ url('assets/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ url('assets/plugins/aos/aos.min.js') }}"></script>
  <script src="{{ url('assets/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ url('assets/plugins/counter-up/jquery.counterup.min.js') }}"></script>
  <script src="{{ url('assets/plugins/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('assets/plugins/isotope/packery.pkgd.min.js') }}"></script>
  <script src="{{ url('assets/plugins/isotope/image.loaded.js') }}"></script>
  <script src="{{ url('assets/plugins/menu/menu.js') }}"></script>
  <!-- Activation Script -->
  <script src="{{ url('assets/js/custom.js') }}"></script>

  @stack('scripts')

</body>
</html>
