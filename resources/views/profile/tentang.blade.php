@extends('layouts.index')
@section('content')
@if($profile)
<section class="tentang">
    <div class="container">
        <div class="vm-content">
            <h2 class="text-center mb-4 fw-bold text-black" style="color: #002147;">Tentang Kami</h2>
        </div>
        <!-- Foto Sekolah -->
        @if($profile->foto)
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $profile->foto) }}"
                     alt="Foto Sekolah"
                     class="img-fluid rounded shadow w-100 tentang-foto">
            </div>
        @endif

        <!-- Konten Profile -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h6 class="text-uppercase text-muted">Profile</h6>
                <h2 class="fw-bold">{{ $profile->nama_sekolah }}</h2>
                <p class="mb-4 text-black">{{ $profile->deskripsi }}</p>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 h-100 text-center">
                            <h6 class="fw-bold mb-2">
                                <i class="fas fa-map-marker-alt text-danger"></i><br> Alamat
                            </h6>
                            <p class="mb-0">{{ $profile->alamat }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 h-100 text-center">
                            <h6 class="fw-bold mb-2">
                                <i class="fas fa-phone text-success"></i><br> Kontak
                            </h6>
                            <p class="mb-0">{{ $profile->kontak ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 h-100 text-center">
                            <h6 class="fw-bold mb-2">
                                <i class="fas fa-calendar-alt text-primary"></i><br> Tahun Berdiri
                            </h6>
                            <p class="mb-0">{{ $profile->tahun_berdiri }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<style>
.vm-content h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background: #002147;
    margin: 12px auto 0;
    border-radius: 2px;
}
.tentang{
    padding-top: 8%;
    margin-bottom: 5%;
}
.tentang-foto {

    max-height: 400px;
    object-fit: cover;
}
.tentang h2 {
    font-size: 2rem;
    color: #002147;
}
.tentang .card {
    border: none;
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.tentang .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 33, 71, 0.2);
}
@media (max-width: 768px) {
    .tentang h2 {
        font-size: 1.5rem;
    }
    .tentang-foto {
        max-height: 250px;
    }
}
</style>
@endsection
