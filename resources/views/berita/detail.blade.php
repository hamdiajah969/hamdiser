@extends('layouts.index')
@section('content')
<!-- Berita Detail Section -->
<section class="detil">
    <div class="container">
        <!-- Breadcrumb -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb bg-light p-3 rounded">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none">
                                <i class="fas fa-home" style="col"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-muted" aria-current="page">
                            Berita
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0">
                    <!-- Gambar Berita -->
                    @if($berita->gambar)
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 400px; object-fit: cover;">
                        
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
                    <a href="{{ route('layouts.home') }}" class="btn btn-back-home btn-lg">
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
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $otherBerita->judul }}</h5>
                        <p class="card-text flex-grow-1" style="max-height: 4.5rem; overflow: hidden; text-overflow: ellipsis;">{{ \Illuminate\Support\Str::limit(strip_tags($otherBerita->isi), 100, '...') }}</p>
                        <i class="fas fa-calendar-alt "> {{ $berita->tanggal }}</i>
                        <hr class="my-3">
                        <small class="text-muted d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user"></i> {{ $otherBerita->user ? $otherBerita->user->name : 'admin' }}</span>
                            <a href="{{ route('berita.detail', $otherBerita->id_berita) }}" class="btn btn-sm text-white" style="background: #002147;">Baca Selengkapnya</a>
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
.detil{
    padding-top: 8%;
    margin-bottom: 3%;
}
.btn-back-home {
    background-color: #002147;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 10px 24px;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
}
.btn-back-home:hover {
    background-color: #013369;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 33, 71, 0.4);
    color: #fff;
}
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
    transition: transform 0.3s ease-in-out;
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
.breadcrumb-item + .breadcrumb-item::before {
        color: orange;
    }
    .breadcrumb .fa-home {
        color: #002147;
    }
    .breadcrumb .breadcrumb-item a {
        color: #002147;
        font-weight: 600;
    }

    .breadcrumb .breadcrumb-item a:hover {
        color: #002147;
        text-decoration: underline;
    }
</style>

@endsection
