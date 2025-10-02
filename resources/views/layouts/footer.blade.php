<footer style="background-color: #002147;" class="bg- text-white pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/foto/nnn.png') }}" alt="Logo Sekolah" height="70" class="me-3" class="me-3">
                    <h5 class="fw-bold m-0">SMK Kapal</h5>
                </div>
                <p>
                    Sekolah teknik kapal adalah institusi pendidikan yang berfokus pada ilmu rekayasa dan teknologi maritim, khususnya dalam perancangan, pembangunan, dan pemeliharaan kapal. Sekolah ini mempersiapkan siswa untuk menjadi profesional terampil di industri perkapalan, mulai dari teknisi hingga insinyur.
                </p>
                <div class="social-icons">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>

            @if (isset($beritas) && $beritas->count() > 0)
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3">LastNews</h5>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-3">
                        @foreach ($beritas->take(2) as $berita )
                        <div>
                            <small>{{ $berita->tanggal }}</small>
                            <h6>{{ $berita->judul }}</h6>
                            <p class="text-white small">Berikut ini pembagian ruang seleksi mata pelajaran pilihan...</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (isset($galeris) && $galeris->count() > 0)
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3">Galeryy</h5>
                <ul class="list-unstyled">
                    @foreach ($galeris->take(2) as $galeri )
                    <li class="d-flex align-items-start mb-3">
                        <div>
                            <small>{{ $galeri->tanggal }}</small>
                            <h6>{{ $galeri->judul }}</h6>
                            <div class="card-img-top"></div>
                        </div>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <div>
                            <small>13 MEI 2019</small>
                            <h6>Pembagian Laporan Hasil...</h6>
                            <p class="text-white small">Pembagian laporan hasil belajar siswa akan dilaksanakan pada...</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <hr class="my-4">
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <p class="text-white mb-0">
                &copy; Copyright 2019. All Rights Reserved By <span class="text-info fw-bold">ICT Teladan</span>
            </p>
        </div>
    </div>
</div>
</footer>
