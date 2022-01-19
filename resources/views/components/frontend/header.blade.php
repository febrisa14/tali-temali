<header class="site-header site-header--menu-right {{ Request::is('login') ? 'sign-in-menu-1' : '' }} site-header--absolute site-header--sticky">
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
                @if(Request::is('/'))
                <li class="nav-item nav-item-has-children">
                  <a href="#" class="nav-link-item drop-trigger">Tali Temali <i class="fas fa-angle-down"></i>
                  </a>
                  <ul class="sub-menu" id="submenu-9">
                    <li class="sub-menu--item">
                      <a href="#definisi">Definisi</a>
                    </li>
                    <li class="sub-menu--item">
                      <a href="#jenis">Jenis</a>
                    </li>
                  </ul>
                </li>
                @endIf
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link-item">Tentang</a>
                </li> -->
              </ul>
              @endIf
            </nav>
          </div>
          @auth
          <div class="header-btn l7-header-btn ms-auto d-none d-xs-inline-flex">
            @if(Auth::User()->role == 'Pengurus')
                <a href="{{ route('admin.dashboard') }}" class="btn btn log-in-btn btn-style-02 focus-reset"><i class="si si-home"></i> Admin Dashboard
                </a>
            @else
                <a href="{{ route('anggota.profile') }}" class="btn btn log-in-btn btn-style-02 focus-reset"><i class="si si-home"></i> Profile
                </a>
            @endIf
            <a class="btn btn log-in-btn btn-style-02 focus-reset" href="{{ route('logout') }}" onclick="
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
          <div class="header-btn l7-header-btn ms-auto d-none d-xs-inline-flex">
            <a class="btn btn log-in-btn btn-style-02 focus-reset" href="{{ route('login') }}">
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
