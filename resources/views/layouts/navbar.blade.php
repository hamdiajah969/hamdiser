<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1 fixed-top">
    <div class="container d-flex justify-content-center">
        <div class="d-flex align-items-center me-4">
            <span class="text-white me-1"><i class="fas fa-map-marker-alt"></i></span>
            <span class="text-white small">Jln Pahlawan Kota Tasik No.8, Karangsari 44139</span>
        </div>
        <div class="d-flex align-items-center me-4">
            <span class="text-white me-1"><i class="fas fa-phone"></i></span>
            <span class="text-white small">0287-381820</span>
        </div>
        <div class="d-flex align-items-center">
            <span class="text-white me-1"><i class="fas fa-envelope"></i></span>
            <span class="text-white small">kapal.tech@gmail.com</span>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0d47a1; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            @if($profile && $profile->logo)
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" height="40" class="me-2">
            @else
                <img src="{{ asset('assets/foto/nnn.png') }}" alt="Logo" height="50" class="me-2">
            @endif
            {{$profile->nama_sekolah}}

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="{{ route('layouts.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('layouts.guru') }}">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ekstrakulikuler</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profile Sekolah</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
    body {
        padding-top: 20px;
    }
</style>
