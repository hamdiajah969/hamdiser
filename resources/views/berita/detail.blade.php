@extends('layouts.index')
@section('title', $berita->judul . ' - ' . ($profile ? $profile->nama_sekolah : 'PPNS Surabaya'))
@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('layouts.home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('layouts.home') }}#berita">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
        </ol>
    </div>
</nav>

<!-- Berita Detail Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0">
                    <!-- Gambar Berita -->
                    @if($berita->gambar)
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 400px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-warning p-3" style="border-radius: 0 0 1rem 0;">
                            <div class="fs-4 fw-bold">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d') }}</div>
                            <div class="small">{{ \Carbon\Carbon::parse($berita->tanggal)->format('M Y') }}</div>
                        </div>
                    </div>
                    @endif

                    <div class="card-body p-4">
                        <!-- Judul -->
                        <h1 class="card-title fw-bold text-dark mb-4" style="font-size: 2.5rem; line-height: 1.2;">{{ $berita->judul }}</h1>

                        <!-- Meta Information -->
                        <div class="d-flex align-items-center mb-4 text-muted">
                            <i class="fas fa-user me-2"></i>
                            <span class="me-4">Penulis: <strong>{{ $berita->user ? $berita->user->name : 'Admin' }}</strong></span>
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>Diterbitkan: <strong>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</strong></span>
                        </div>

                        <hr class="my-4">

                        <!-- Isi Berita -->
                        <div class="berita-content" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                            {!! nl2br(e($berita->isi)) !!}
                        </div>
                    </div>
                </div>

                <!-- Tombol Kembali -->
                <div class="text-center mt-4">
                    <a href="{{ route('layouts.home') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Lainnya Section -->
@if(isset($beritas) && $beritas->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold text-dark">Berita Lainnya</h2>
        <div class="row justify-content-center">
            @foreach($beritas->where('id_berita', '!=', $berita->id_berita)->take(3) as $otherBerita)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm overflow-hidden">
                    @if($otherBerita->gambar)
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $otherBerita->gambar) }}" class="card-img-top" alt="{{ $otherBerita->judul }}" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-warning p-2" style="width: 60px; height: 60px; border-radius: 0 0 1rem 0;">
                            <div class="fs-5 fw-bold">{{ \Carbon\Carbon::parse($otherBerita->tanggal)->format('d') }}</div>
                            <div class="small">{{ \Carbon\Carbon::parse($otherBerita->tanggal)->format('M') }}</div>
                        </div>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $otherBerita->judul }}</h5>
                        <p class="card-text flex-grow-1" style="max-height: 4.5rem; overflow: hidden; text-overflow: ellipsis;">{{ \Illuminate\Support\Str::limit(strip_tags($otherBerita->isi), 100, '...') }}</p>
                        <hr class="my-3">
                        <small class="text-muted d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user"></i> {{ $otherBerita->user ? $otherBerita->user->name : 'admin' }}</span>
                            <a href="{{ route('berita.detail', $otherBerita->id_berita) }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
.berita-content p {
    margin-bottom: 1.5rem;
}

.berita-content img {
    max-width: 100%;
    height: auto;
    margin: 1rem 0;
    border-radius: 0.5rem;
}

.position-relative.overflow-hidden img {
    transition: transform 0.3s ease;
}

.position-relative.overflow-hidden img:hover {
    transform: scale(1.05);
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card-img-top:hover {
    transform: scale(1.02);
}

.breadcrumb {
    background-color: #f8f9fa !important;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
}
</style>

@endsection
