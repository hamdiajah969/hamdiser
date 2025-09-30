@extends('layouts.index')
@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: -60px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/foto/kapal.png') }}" class="d-block w-100" alt="Slide 1" style="height:90vh;object-fit:cover;">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h5 class="text-white mb-2">Selamat Datang</h5>
                @if ($profile)
                <h1 class="fw-bold text-warning">{{ $profile->nama_sekolah }}</h1>
                @endif
                <p class="text-white">Onlimitéiert Wëssen</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/foto/logo1.png') }}" class="d-block w-100" alt="Slide 2" style="height:90vh;object-fit:cover;">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
            </div>
        </div>
    </div>

    <!-- Profile Sekolah Section -->
    @if($profile)
    <section class="py-5 bg-light" style="">
        <div class="container">
           <h2 class="text-center mb-4 fw-bold text-black">Tentang Kami</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center mb-4 mb-lg-0">
                    @if($profile->foto)
                        <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                    @endif
                </div>
                <div class="col-lg-6">
                    <h6 class="text-uppercase text-muted">Profile</h6>
                    <h2 class="fw-bold">{{ $profile->nama_sekolah }}</h2>
                    <p class="mb-4 text-black">{{ $profile->deskripsi }}</p>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card shadow-sm p-3 h-100">
                                <h6 class="fw-bold"><i class="fas fa-map-marker-alt"></i>  Alamat</h6>
                                <p class="mb-0">{{ $profile->alamat }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm p-3 h-100">
                                <h6 class="fw-bold"><i class="fas fa-phone"></i> Kontak</h6>
                                <p class="mb-0">{{ $profile->kontak ?? 'Tidak tersedia' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm p-3 h-100">
                                <h6 class="fw-bold"><i class="fas fa-calendar-alt"></i> Tahun Berdiri</h6>
                                <p class="mb-0">{{ $profile->tahun_berdiri }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif



    <!-- Berita Terbaru Section -->
    @if(isset($beritas) && $beritas->count() > 0)
    <section class="py-5" style="background: #0d47a1;">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold text-white">Berita Terbaru</h2>
            <div class="row justify-content-center">
                @foreach($beritas as $berita)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($berita->gambar)
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-warning p-3" style="width: 80px; height: 80px; border-radius: 0 0 1rem 0;">
                                <div class="fs-3 fw-bold">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d') }}</div>
                                <div class="small">{{ \Carbon\Carbon::parse($berita->tanggal)->format('M, Y') }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $berita->judul }}</h5>
                            <p class="card-text flex-grow-1" style="max-height: 4.5rem; overflow: hidden; text-overflow: ellipsis;">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, '...') }}</p>
                            <hr class="my-4">
                            <small class="text-muted"><i class="fas fa-user"></i> {{ $berita->user ? $berita->user->name : 'admin' }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif



    <!-- Gallery Section -->
    @if(isset($galeris) && $galeris->count() > 0)
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Galeri</h2>
            <div class="row justify-content-center">
                @foreach($galeris as $galeri)
                <div class="col-md-3 mb-4">
                    <div class="card border shadow-sm text-center">
                        @if($galeri->kategori === 'video')
                            <video class="card-img-top" controls style="height: 180px; object-fit: cover;">
                                <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('storage/' . $galeri->file) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body p-2">
                            <p class="card-text text-truncate" style="font-size: 0.9rem;">{{ $galeri->judul }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Ekstrakulikuler Section -->
    @if(isset($ekstrakulikulers) && $ekstrakulikulers->count() > 0)
    <section class="py-5" style="background: #0d47a1;">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold text-white">Ekstrakulikuler</h2>
            <div class="row justify-content-center">
                @foreach($ekstrakulikulers->take(3) as $ekstrakulikuler)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($ekstrakulikuler->gambar)
                        <img src="{{ asset('storage/' . $ekstrakulikuler->gambar) }}" class="card-img-top" alt="{{ $ekstrakulikuler->nama_ekskul }}" style="height: 250px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $ekstrakulikuler->nama_ekskul }}</h5>
                            <p class="card-text flex-grow-1" style="max-height: 4.5rem; overflow: hidden; text-overflow: ellipsis;">{{ \Illuminate\Support\Str::limit(strip_tags($ekstrakulikuler->deskripsi), 100, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Guru dan Siswa Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" >Guru dan Siswa</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm text-center p-4">
                        <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-primary"></i>
                        <h3 class="fw-bold">{{ $gurus->count() }}</h3>
                        <p class="mb-0">Total Guru</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center p-4">
                        <i class="fas fa-user-graduate fa-3x mb-3 text-success"></i>
                        <h3 class="fw-bold">{{ $siswas->count() }}</h3>
                        <p class="mb-0">Total Siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
