@extends('admin.layouts.admin')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <h5 class="fw-bold text-dark">Data Profile Sekolah</h5>
        <a href="{{ route('admin.profile_sekolah.create') }}"
           class="btn btn-primary rounded-3 fw-bold"
           style="background:#0d47a1;">
            <i class="fas fa-plus"></i> Tambah Profile Sekolah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th width="5%">ID</th>
                        <th>Nama Sekolah</th>
                        <th>Kepala Sekolah</th>
                        <th>NPSN</th>
                        <th>Alamat</th>
                        <th width="10%">Foto</th>
                        <th width="10%">Logo</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($profileSekolahs as $profileSekolah)
                        <tr class="text-center align-middle">
                            <td>{{ $profileSekolah->id_profil }}</td>
                            <td class="">{{ Str::limit($profileSekolah->nama_sekolah, 30) }}</td>
                            <td class="">{{ Str::limit($profileSekolah->kepala_sekolah, 30) }}</td>
                            <td class="">{{ $profileSekolah->npsn }}</td>
                            <td class="">{{ Str::limit($profileSekolah->alamat, 50) }}</td>
                            <td class="">
                                @if($profileSekolah->foto)
                                    <img src="{{ asset('storage/' . $profileSekolah->foto) }}" alt="Foto" width="50" height="50" class="rounded">
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </td>
                            <td class="">
                                @if($profileSekolah->logo)
                                    <img src="{{ asset('storage/' . $profileSekolah->logo) }}" alt="Logo" width="50" height="50" class="rounded">
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.profile_sekolah.edit', Crypt::encrypt($profileSekolah->id_profil)) }}"
                                       class="btn btn-sm btn-warning fw-bold"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.profile_sekolah.destroy', Crypt::encrypt($profileSekolah->id_profil)) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus?')"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger fw-bold"
                                                data-bs-toggle="tooltip" title="Hapus">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="8">Tidak ada data profile sekolah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
