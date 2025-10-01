@extends('admin.layouts.admin')
@section('content')


<div class="container mt-4">
    @forelse ($profileSekolahs as $profile)
        <div class="card shadow-sm border-0 mb-4" style="background: #0d47a1;">
            <div class="card-body p-4">
                <div class="row align-items-center mb-4">
                    <div class="col-md-2 text-center">
                        @if($profile->logo)
                            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Sekolah" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/foto/logo1.png') }}" alt="Logo Sekolah" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="col-md-10">
                        <h2 class="fw-bold text-white mb-1">{{ $profile->nama_sekolah }}</h2>
                        <p class="text-white mb-1">NPSN: {{ $profile->npsn }}</p>
                        <p class="text-white">Didirikan: {{ $profile->tahun_berdiri }}</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="fw-bold text-white mb-2">Deskripsi Singkat :</h5>
                        <p class="text-white">{{ $profile->deskripsi }}</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h5 class="fw-bold text-white mb-2">Foto Sekolah</h5>
                        @if($profile->foto)
                            <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Kepala Sekolah" class="img-fluid rounded mb-2" style="width: 150px; height: auto;">
                        @endif
                        <p class="text-white"><strong>Nama Kepala Sekolah:</strong> {{ $profile->kepala_sekolah }}</p>
                    </div>
                    <div class="col-md-8">
                        <h5 class="fw-bold text-white mb-2">Alamat & Kontak</h5>
                        <p class="text-white"><strong>Alamat:</strong> {{ $profile->alamat }}</p>
                        <p class="text-white"><strong>Kontak:</strong> {{ $profile->kontak ?? 'Tidak tersedia' }}</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-primary p-3 rounded">
                            <h5 class="fw-bold text-white mb-3">Visi & Misi</h5>
                            <div class="text-white">
                                {!! nl2br(e($profile->visi_misi)) !!}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.profile_sekolah.edit', Crypt::encrypt($profile->id_profil)) }}" class="btn btn-primary me-2">Edit Profile</a>
                    <form action="{{ route('admin.profile_sekolah.destroy', Crypt::encrypt($profile->id_profil)) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <!-- <button type="submit" class="btn btn-danger">Hapus</button> -->
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <i class="fa-solid fa-building fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">Belum Ada Data Profile Sekolah</h5>
            <a href="{{ route('admin.profile_sekolah.create') }}" class="btn btn-primary">Tambah Profile Sekolah</a>
        </div>
    @endforelse
</div>


@endsection
