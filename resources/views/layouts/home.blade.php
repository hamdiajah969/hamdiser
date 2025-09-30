@extends('layouts.index')
@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: -60px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/foto/kapal.png') }}" class="d-block w-100" alt="Slide 1" style="height:90vh;object-fit:cover;">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h5 class="text-white mb-2">Selamat Datang</h5>
                <h1 class="fw-bold text-warning">SMK NEGERI PERKAPALAN</h1>
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
    <section class="py-5" style="background: #0d47a1;">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold text-white">Profile Sekolah</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center mb-4 mb-lg-0">
                    @if($profile->logo)
                        <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Sekolah" class="img-fluid mb-3" style="max-width: 150px;">
                    @endif
                    <h2 class="fw-bold text-white">{{ $profile->nama_sekolah }}</h2>
                    <p class="fw-bold text-white">NPSN: {{ $profile->npsn }}</p>
                    <p class="fw-bold text-white">Tahun Berdiri: {{ $profile->tahun_berdiri }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Tentang Sekolah</h5>
                            <p class="card-text">{{ $profile->deskripsi }}</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary">Kepala Sekolah</h6>
                                    <p>{{ $profile->kepala_sekolah }}</p>
                                    @if($profile->foto)
                                        <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Kepala Sekolah" class="img-fluid mb-3" style="max-width: 150px;">
                                    @endif
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $profile->alamat }}</p>
                                    <p><i class="fas fa-phone"></i> {{ $profile->kontak ?? 'Tidak tersedia' }}</p>
                                </div>
                            </div>
                            <hr>
                            <h6 class="fw-bold text-primary">Visi & Misi</h6>
                            <p class="small">{!! nl2br(e($profile->visi_misi)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Guru dan Siswa Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" >Guru dan Siswa</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Guru</h5>
                            <p class="card-text">Total Guru: {{ $gurus->count() }}</p>
                            @if($gurus->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach($gurus->take(5) as $guru)
                                        <li class="list-group-item">{{ $guru->nama_guru }} - {{ $guru->mapel }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Siswa</h5>
                            <p class="card-text">Total Siswa: {{ $siswas->count() }}</p>
                            @if($siswas->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach($siswas->take(5) as $siswa)
                                        <li class="list-group-item">{{ $siswa->nama_siswa }} - {{ $siswa->jenis_kelamin }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 220px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-warning p-3" style="width: 80px; height: 80px; border-radius: 0 0 1rem 0;">
                                <div class="fs-3 fw-bold">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d') }}</div>
                                <div class="small">{{ \Carbon\Carbon::parse($berita->tanggal)->format('M, Y') }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $berita->judul }}</h5>
                            <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, '...') }}</p>
                            <a href="#" class="text-decoration-none fw-bold">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <small class="text-muted"><i class="fas fa-user"></i> {{ $berita->user ? $berita->user->name : 'admin' }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection
