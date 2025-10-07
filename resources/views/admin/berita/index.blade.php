@extends('admin.layouts.admin')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <h5 class="fw-bold text-dark">Data Berita</h5>
        <a href="{{ route('admin.berita.create') }}"
           class="btn text-white rounded-3 fw-bold"
           style="background: #002147;">
            <i class=""></i> Tambah
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
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th width="10%">Gambar</th>
                        <th>Penulis</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritas as $berita)
                        <tr class="text-center align-middle">
                            <td>{{ $berita->id_berita }}</td>
                            <td class="">{{ Str::limit($berita->judul, 30) }}</td>
                            <td class="">{{ Str::limit($berita->isi, 50) }}</td>
                            <td class="">{{ $berita->tanggal }}</td>
                            <td class="">
                                @if($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" width="120" height="20" class="img-thumbnail">
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </td>
                            <td class="">{{ $berita->user->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.berita.edit', Crypt::encrypt($berita->id_berita)) }}"
                                       class="btn btn-sm btn-warning fw-bold"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class=""></i> Edit
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', Crypt::encrypt($berita->id_berita)) }}"
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
                            <td colspan="7">Tidak ada data berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
