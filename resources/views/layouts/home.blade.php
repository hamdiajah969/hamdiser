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
                {{-- <h5 class="text-white mb-2">Selamat Datang</h5>
                <h1 class="fw-bold text-warning">Judul Slide 2</h1>
                <p class="text-white">Deskripsi Slide 2</p> --}}
            </div>
        </div>
    </div>
@endsection
