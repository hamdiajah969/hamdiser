@extends('admin.layouts.admin')
@section('content')
<div class="container mt-4">
    @forelse ($profileSekolahs as $profile)
        <!-- Card Utama -->
        <div class="card shadow-lg border-0 mb-4" style="background:#002147; border-radius: 15px;">
            <div class="card-body p-5">

                <!-- Header dengan Logo dan Identitas Sekolah -->
                <div class="row align-items-center mb-5">
                    <div class="col-md-3 text-center">
                        @if($profile->logo)
                            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Sekolah" class="img-fluid rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;">
                        @else
                            <img src="{{ asset('assets/foto/logo1.png') }}" alt="Logo Sekolah" class="img-fluid rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h1 class="fw-bold text-white mb-3" style="font-size: 2.2rem;">{{ $profile->nama_sekolah }}</h1>
                        <div class="d-flex flex-wrap">
                            <div class="me-4 mb-2">
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                    <i class="fas fa-id-card me-2"></i>NPSN: {{ $profile->npsn }}
                                </span>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                    <i class="fas fa-calendar-alt me-2"></i>Didirikan: {{ $profile->tahun_berdiri }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Sekolah -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm mb-4" style="background: rgba(255,255,255,0.1);">
                            <div class="card-body p-4">
                                <h4 class="fw-bold text-white mb-3 d-flex align-items-center">
                                    <i class="fas fa-info-circle me-2"></i>Deskripsi Sekolah
                                </h4>
                                <p class="text-white mb-0" style="font-size: 1.1rem; line-height: 1.7; text-align: justify;">
                                    {{ $profile->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Detail Sekolah -->
                <div class="row mb-5">
                    <!-- Foto Sekolah & Kepala Sekolah -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100" style="background: rgba(255,255,255,0.1);">
                            <div class="card-body p-4">
                                <h4 class="fw-bold text-white mb-3 d-flex align-items-center">
                                    <i class="fas fa-image me-2"></i>Foto Sekolah
                                </h4>
                                @if($profile->foto)
                                    <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow mb-4" style="width: 100%; height: 200px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center mb-4" style="height: 200px;">
                                        <i class="fas fa-school text-muted" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                                <div class="bg-white rounded p-3 text-center">
                                    <h5 class="fw-bold mb-2" style="color: #002147;">Kepala Sekolah</h5>
                                    <p class="mb-0 fw-semibold">{{ $profile->kepala_sekolah }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat & Kontak -->
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm h-100" style="background: rgba(255,255,255,0.1);">
                            <div class="card-body p-4">
                                <h4 class="fw-bold text-white mb-3 d-flex align-items-center">
                                    <i class="fas fa-map-marked-alt me-2"></i>Informasi Kontak
                                </h4>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="bg-white rounded p-3 h-100">
                                            <h5 class="fw-bold mb-3 d-flex align-items-center" style="color: #002147;">
                                                <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                            </h5>
                                            <p class="mb-0" style="line-height: 1.6;">{{ $profile->alamat }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="bg-white rounded p-3 h-100">
                                            <h5 class="fw-bold mb-3 d-flex align-items-center" style="color: #002147;">
                                                <i class="fas fa-phone me-2"></i>Kontak
                                            </h5>
                                            <p class="mb-0">{{ $profile->kontak ?? 'Tidak tersedia' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Tambahan -->
                                <div class="bg-white rounded p-3 mt-3">
                                    <h5 class="fw-bold mb-3 d-flex align-items-center" style="color: #002147;">
                                        <i class="fas fa-info-circle me-2"></i>Informasi Lainnya
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong>Status:</strong> Negeri</p>
                                            <p class="mb-0"><strong>Akreditasi:</strong> A</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong>Jenjang:</strong> SMA</p>
                                            <p class="mb-0"><strong>Kurikulum:</strong> Merdeka</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visi & Misi -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-3 d-flex align-items-center" style="color: #002147;">
                                    <i class="fas fa-bullseye me-2"></i>Visi & Misi Sekolah
                                </h4>
                                <div class="bg-light rounded p-4">
                                    <div class="text-dark" style="font-size: 1.1rem; line-height: 1.7; text-align: justify;">
                                        {!! nl2br(e($profile->visi_misi)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end mt-5">
                    <a href="{{ route('admin.profile_sekolah.edit', Crypt::encrypt($profile->id_profil)) }}" class="btn btn-light btn-lg me-3 shadow d-flex align-items-center" style="border-radius: 25px; font-weight: 600;">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </a>
                    <form action="{{ route('admin.profile_sekolah.destroy', Crypt::encrypt($profile->id_profil)) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <!-- <button type="submit" class="btn btn-danger btn-lg shadow d-flex align-items-center" style="border-radius: 25px; font-weight: 600;">
                            <i class="fas fa-trash me-2"></i> Hapus
                        </button> -->
                    </form>
                </div>
            </div>
        </div>
    @empty
        <!-- Tampilan jika tidak ada data -->
        <div class="text-center py-5">
            <div class="card border-0 shadow-lg py-5" style="background: #002147; border-radius: 15px;">
                <div class="card-body py-5">
                    <i class="fa-solid fa-building fa-4x text-white mb-4"></i>
                    <h4 class="text-white mb-4">Belum Ada Data Profile Sekolah</h4>
                    <a href="{{ route('admin.profile_sekolah.create') }}" class="btn btn-light btn-lg shadow d-flex align-items-center mx-auto" style="border-radius: 25px; font-weight: 600; width: fit-content;">
                        <i class="fas fa-plus me-2"></i> Tambah Profile Sekolah
                    </a>
                </div>
            </div>
        </div>
    @endforelse
</div>

@endsection
