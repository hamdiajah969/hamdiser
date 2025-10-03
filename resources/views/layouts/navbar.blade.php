<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm"
     style="background-color: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1),
            0 2px 4px -1px rgba(0,0,0,0.06);">
    <div class="container">
        <!-- Logo & Nama Sekolah -->
        <a class="navbar-brand d-flex align-items-center text-dark fw-bold" href="#">
            @if($profile && $profile->logo)
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" height="40" class="me-2">
            @else
                <img src="{{ asset('assets/foto/nnn.png') }}" alt="Logo" height="50" class="me-2">
            @endif
            <span class="school-name">{{ $profile->nama_sekolah }}</span>
        </a>

        <!-- Toggle Button untuk Mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('layouts.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('layouts.guru') }}">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('layouts.galeri') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="#">Ekstrakulikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="#">Profile Sekolah</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        background-color: rgba(255, 255, 255, 0.3) !important;
        backdrop-filter: blur(10px);
    }
    .school-name {
        font-size: 1rem;
        white-space: nowrap;
    }
    @media (max-width: 991px) {
        .navbar-nav {
            margin-top: 10px;
        }
    }
</style>
