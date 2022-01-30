<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <img class="smini-visible" src="{{ url('assets/image/mapala-logo.jpg') }}" alt="" width="10%">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="#">
            <span class="smini-hide font-size-h5 tracking-wider">
                <span class="font-w400">Tali</span> Temali
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    @if (Auth::User()->role == "Pengurus")

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="nav-main-link-icon si si-home"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">Master Data</li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('admin/anggota*') ? 'active' : '' }}" href="{{ route('admin.anggota.index') }}">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Anggota</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('admin/materi*') ? 'active' : '' }}" href="{{ route('admin.materi.index') }}">
                        <i class="nav-main-link-icon fa fa-list"></i>
                        <span class="nav-main-link-name">Materi</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('admin/quiz*') ? 'active' : '' }}" href="{{ route('admin.quiz.index') }}">
                        <i class="nav-main-link-icon fa fa-list-alt"></i>
                        <span class="nav-main-link-name">Quiz</span>
                    </a>
                </li>
                <li class="nav-main-heading">Akun</li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('admin/profile*') ? 'active' : '' }}" href="{{ route('admin.profile') }}">
                        <i class="nav-main-link-icon fas fa-user"></i>
                        <span class="nav-main-link-name">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->

    @else

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('home') }}">
                        <i class="nav-main-link-icon si si-home"></i>
                        <span class="nav-main-link-name">Beranda</span>
                    </a>
                </li>
                <li class="nav-main-heading">Akun</li>
                @if (Request::is('anggota/profile*'))
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('anggota/profile*') ? 'active' : '' }}" href="{{ route('anggota.profile') }}">
                        <i class="nav-main-link-icon fas fa-user"></i>
                        <span class="nav-main-link-name">Profile</span>
                    </a>
                </li>
                @else
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('anggota/quiz*') ? 'active' : '' }}" href="{{ route('anggota.quiz.index') }}">
                        <i class="nav-main-link-icon fa fa-list-alt"></i>
                        <span class="nav-main-link-name">Quiz</span>
                    </a>
                </li>
                @endIf
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->

    @endIf
</nav>
<!-- END Sidebar -->
