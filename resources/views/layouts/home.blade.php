@extends('layouts.index')
@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
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
                                        <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Kepala Sekolah" class="img-fluid rounded" style="max-width: 100px;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary">Kontak & Alamat</h6>
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
            <h2 class="text-center mb-4 fw-bold" >Data Guru dan Siswa</h2>
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

@endsection
