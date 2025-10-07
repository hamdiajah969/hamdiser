@extends('layouts.index')
@section('content')
<section class="berita">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-17">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-light p-3 rounded">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-decoration-none">
                            <i class="fas fa-home" style="col"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">
                        Ekstrakurikuler
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
            @foreach($beritas as $berita)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm overflow-hidden">
                    @if($berita->gambar)
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                             class="card-img-top"
                             alt="{{ $berita->judul }}"
                             style="height: 250px; object-fit: cover;">
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $berita->judul }}</h5>
                        <p class="card-text flex-grow-1" style="max-height:4.5rem;overflow:hidden;">
                            {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, '...') }}
                        </p>
                        <i class="fas fa-calendar-alt "> {{ $berita->tanggal }}</i>
                        <hr class="my-4">
                        <small class="text-muted d-flex justify-content-between align-items-center w-100">
                            <span><i class="fas fa-user"></i> {{ $berita->user ? $berita->user->name : 'admin' }}</span>
                            <a href="{{ url('/berita/' . $berita->id_berita) }}" class="btnd">Detail</a>
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
<style>
    .berita{
        padding-top: 8%;
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
    .btnd {
    display: inline-block;
    font-size: 0.8rem;
    font-weight: 500;
    padding: 4px 10px;
    color: #fff;
    background-color: #002147;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s ease;
}
.btnd:hover {
    background-color: #014080;
    text-decoration: none;
    color: #fff;
}
</style>
@endsection