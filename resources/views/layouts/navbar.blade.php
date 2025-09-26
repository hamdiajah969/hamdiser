<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
        <div class="container d-flex justify-content-start">
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
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0d47a1;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/foto/nnn.png') }}" alt="Logo" height="40" class="me-2">
            SMK Kapal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Programme</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Curriculum</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Output Profile</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item"><a class="btn nav-link" href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
