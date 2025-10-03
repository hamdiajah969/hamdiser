@extends('layouts.index')
@section('content')
@if(isset($galeris) && $galeris->count() > 0)
<section class="galeri">
    <div class="container">
        <!-- Breadcrumb galeri -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <i class="fas fa-home" style="col"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active text-muted" aria-current="page">
                    Album Sekolah
                </li>
            </ol>
        </nav>

        <!-- Content Galeri -->
        <div class="row justify-content-center">
            @foreach($galeris as $galeri)
            <div class="col-md-3 mb-4">
                <div class="card border shadow-sm text-center overflow-hidden">
                    @if($galeri->kategori === 'video')
                        <video class="card-img-top" controls style="height: 180px; object-fit: cover;">
                            <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $galeri->file) }}" class="card-img-top berita-img" alt="{{ $galeri->judul }}" style="height: 180px; object-fit: cover;">
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
<style>
    .galeri{
        padding-top:8%;
        margin-bottom: 5%;
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
