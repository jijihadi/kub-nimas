<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            KUB<span>IKAN</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item {{ cek_active('home') }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard 
                    {!! (Auth::user()->role==2 ? "Admin" : "Perangkat KUB")!!}
                    </span>
                </a>
            </li>
            @if (cek_admin() != 0)
            <li class="nav-item {{ cek_active('rapat-add') }}">
                <a href="{{ url('/rapat-add') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Buat Rapat
                    </span>
                </a>
            </li>
            @endif
            <li class="nav-item nav-category">data kub</li>
            <li class="nav-item">
                <a href="{{ url('buku-tamu') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">Buku Tamu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Surat</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('surat-masuk') }}" class="nav-link">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('surat-keluar') }}" class="nav-link">Surat Keluar</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ url('inventaris-barang') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Inventaris Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('kas') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Kas</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('hasil-produksi') }}" class="nav-link">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Hasil Produksi</span>
                </a>
            </li>
            <li class="nav-item nav-category">keanggotaan</li>
            @if (cek_admin() == 0)
                <li class="nav-item">
                    <a href="{{ url('list-kub') }}" class="nav-link">
                        <i class="link-icon" data-feather="briefcase"></i>
                        <span class="link-title">Data KUB</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ url('list-anggota') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Data Anggota</span>
                </a>
            </li>
            @if (cek_admin() == 0)
                <li class="nav-item">
                    <a href="{{ url('list-user') }}" class="nav-link">
                        <i class="link-icon" data-feather="user-check"></i>
                        <span class="link-title">Data User</span>
                    </a>
                </li>
            @endif
            <li class="nav-item nav-category">kegiatan</li>
            <li class="nav-item">
                <a href="{{ url('rencana-kegiatan') }}" class="nav-link">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="link-title">Rencana Kegiatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('daftar-hadir') }}" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Daftar Kehadiran</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('usaha') }}" class="nav-link">
                    <i class="link-icon" data-feather="truck"></i>
                    <span class="link-title">Kegiatan Usaha</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('notulen') }}" class="nav-link">
                    <i class="link-icon" data-feather="paperclip"></i>
                    <span class="link-title">Notulen</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
