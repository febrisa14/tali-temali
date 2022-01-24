{{-- <header class="site-header site-header--menu-right site-header--absolute site-header--sticky"> --}}
<header class="site-header {{ Request::is('login') || Request::is('kurikulum') || Request::is('kurikulum/*') || Request::is('register') ? 'site-header--menu-right sign-in-menu-1' : 'site-header--menu-center' }} landing-6-menu site-header--absolute site-header--sticky">
    <div class="container">
        <nav class="navbar site-navbar">
          <!-- Brand Logo-->
          <div class="brand-logo">
            <a href="{{ route('home') }}">
              <!-- light version logo (logo must be black)-->
              <img src="{{ url('assets/image/mapala-dark.png') }}" height="34" alt="" class="light-version-logo">
            </a>
          </div>
          <div class="menu-block-wrapper">
            <div class="menu-overlay"></div>
            <nav class="menu-block" id="append-menu-header">
              <div class="mobile-menu-head">
                <div class="go-back">
                  <i class="fa fa-angle-left"></i>
                </div>
                <div class="current-menu-title"></div>
                <div class="mobile-menu-close">&times;</div>
              </div>
              @if(Request::is('login'))
              <ul class="site-menu-main">
                <li class="nav-item">
                  <a href="{{ route('home') }}" class="nav-link-item">Beranda</a>
                </li>
              </ul>
              @else
              <ul class="site-menu-main">
                <li class="nav-item">
                  <a href="{{ route('home') }}" class="nav-link-item">Beranda</a>
                </li>
                @if(Request::is('kurikulum/*'))
                <li class="nav-item">
                    <a href="{{ route('kurikulum') }}" class="nav-link-item">Kurikulum</a>
                </li>
                @endIf
                @if(Request::is('/'))
                <li class="nav-item">
                    <a href="#mapala-kompas" class="nav-link-item">Mapala Kompas</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kurikulum') }}" class="nav-link-item">Kurikulum</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link-item">Quiz</a>
                </li>
                @endIf
              </ul>
              @endIf
            </nav>
          </div>
          @auth
          <div class="header-btn l7-header-btn ms-auto d-none d-xs-inline-flex">
            @if(Auth::User()->role == 'Pengurus')
                <a href="{{ route('admin.dashboard') }}" class="btn btn btn-style-03 focus-reset"><i class="si si-home"></i> Admin Dashboard
                </a>
            @else
                <a href="{{ route('anggota.profile') }}" class="btn btn btn-style-03 focus-reset"><i class="si si-home"></i> Profile
                </a>
            @endIf
            <a class="btn btn btn-style-03 focus-reset" href="{{ route('logout') }}" onclick="
              event.preventDefault();
              document.getElementById('logout-form').submit();
            ">Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
          @endauth
          @guest
          <div class="header-btn l6-header-btn  ms-auto d-none d-xs-inline-flex">
            <a class="btn btn btn-style-03 focus-reset" href="{{ route('login') }}">
              Login
            </a>
          </div>
          @endguest
          <!-- mobile menu trigger -->
          <div class="mobile-menu-trigger">
            <span></span>
          </div>
          <!--/.Mobile Menu Hamburger Ends-->
        </nav>
      </div>
    </header>
