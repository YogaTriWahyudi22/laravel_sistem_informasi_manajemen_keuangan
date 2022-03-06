<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('gambar/logo2.png') }}" alt="" width="80rem" class="light-logo ml-5">
            {{-- <img src="{{ asset('vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo"> --}}
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                @if (Auth::user()->status == 'admin')
                    <li>
                        <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-dashboard ml-1"></span><span
                                class="mtext">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kelola_akun') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-user-plus ml-1"></span><span
                                class="mtext">Kelola
                                Akun</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('siswa') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-users"></span><span class="mtext">Input Data
                                Siswa</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('guru') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-users"></span><span class="mtext">Input Data
                                Guru</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kelas') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-building-o"></span><span class="mtext">Input Data
                                Kelas</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('jurusan') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-address-book"></span><span class="mtext">Input Data
                                Jurusan</span>
                        </a>
                    </li>
                @elseif(Auth::user()->status == 'bendahara')
                    <li>
                        <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-dashboard ml-1"></span><span
                                class="mtext">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pembayaran') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-money ml-1"></span><span class="mtext">Kelola
                                Pembayaran</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon icon-copy fa fa-level-down"></span><span class="mtext"> Kas
                                Masuk</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('pendaftaran') }}">Pendaftaran</a></li>
                            <li><a href="{{ route('uang_seragam') }}">Uang Seragam</a></li>
                            <li><a href="{{ route('uang_spp') }}">Uang SPP</a></li>
                            <li><a href="{{ route('dsp') }}">Uang DSP</a></li>
                            <li><a href="{{ route('pkl') }}">Uang PKL</a></li>
                            <li><a href="{{ route('uang_ujian') }}">Uang Ujian</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon icon-copy fa fa-level-up"></span><span class="mtext"> Kas
                                Keluar</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('pembayaran_gaji') }}">Pembayaran Gaji</a></li>
                            <li><a href="{{ route('pembayaran_lain') }}">pengeluaran Laninya</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('laporan') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-tasks"></span><span class="mtext">Laporan
                                Keuangan</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon icon-copy fa fa-level-down"></span><span class="mtext"> Laporan
                                Arsip</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('piutang') }}">Piutang</a></li>
                            <li><a href="{{ route('arsip_siswa') }}">Arsip Siswa</a></li>
                        </ul>
                    </li>
                @elseif(Auth::user()->status == 'kepsek')
                    <li>
                        <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-dashboard ml-1"></span><span
                                class="mtext">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('laporan') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-tasks"></span><span class="mtext">Laporan</span>
                        </a>
                    </li>
                @elseif(Auth::user()->status == 'ketua_yayasan')
                    <li>
                        <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-dashboard ml-1"></span><span
                                class="mtext">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('laporan') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy fa fa-tasks"></span><span class="mtext">Laporan</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
