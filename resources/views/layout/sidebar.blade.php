<nav class="sidebar sidebar-offcanvas bg-light" id="sidebar">
    <div class="sidebar-brand-wrapper bg-light d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" style="color: #000000">Web Presensi</a>
        {{-- <a class="sidebar-brand brand-logo-mini"></a> --}}
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('img/rpl.png') }}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h4 class="mb-0 font-weight-normal text-dark">{{ Auth::user()->name }}</h4>
                        <span class="text-dark">{{ Auth::user()->jabatan }}</span>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link text-dark">Navigation</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->jabatan == 'admin')
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#guru">
                    <span class="menu-icon">
                        <i class="mdi mdi-account"></i>
                    </span>
                    <span class="menu-title">User</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="guru">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/guru">Tambah Data</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/guru/data">Data User</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#siswa">
                    <span class="menu-icon">
                        <i class="mdi mdi-account"></i>
                    </span>
                    <span class="menu-title">Siswa</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="siswa">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/siswa">Tambah Data</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/siswa/data">Data Siswa</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="/mapel">
                    <span class="menu-icon">
                        <i class="mdi mdi-clipboard-text"></i>
                    </span>
                    <span class="menu-title">Mapel</span>
                </a>
            </li>
        @endif


        @if (Auth::user()->jabatan == 'admin')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/kelas">
                    <span class="menu-icon">
                        <i class="mdi mdi-source-branch"></i>
                    </span>
                    <span class="menu-title">Kelas</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="/jurusan">
                    <span class="menu-icon">
                        <i class="mdi mdi-arrange-send-backward"></i>
                    </span>
                    <span class="menu-title">Jurusan</span>
                </a>
            </li>
        @endif

        <li class="nav-item menu-items">
            <a class="nav-link" href="/absensi">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Absensi</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/absen-jurusan">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Laporan Absen</span>
            </a>
        </li>
    </ul>
</nav>
