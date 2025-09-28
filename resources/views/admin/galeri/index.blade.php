@extends('admin.layouts.admin')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <h5 class="fw-bold text-dark">Data Galeri</h5>
        <a href="{{ route('admin.galeri.create') }}"
           class="btn btn-primary rounded-3 fw-bold"
           style="background:#0d47a1;">
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
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th width="10%">File</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeris as $galeri)
                        <tr class="text-center align-middle">
                            <td>{{ $galeri->id_galeri }}</td>
                            <td class="">{{ Str::limit($galeri->judul, 50) }}</td>
                            <td class="">{{ $galeri->tanggal }}</td>
                            <td class="">
                                <span class="badge bg-primary">{{ $galeri->kategori }}</span>
                            </td>
                            <td>
                                @if($galeri->file == 'Foto')
                                    <img src="{{ asset('storage/' . $galeri->file) }}"
                                        width="120" class="img-thumbnail">
                                @elseif($galeri->file == 'Video')
                                    <video width="150" controls>
                                        <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                                        Browser tidak mendukung video.
                                    </video>
                                @endif
                                <!-- @if($galeri->file)
                                    @if($galeri->kategori === 'Foto')
                                        <img src="{{ asset('storage/' . $galeri->file) }}" alt="File" width="50" height="50" class="rounded">
                                    @else
                                        <span class="badge bg-info">Video</span>
                                    @endif
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif -->
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.galeri.edit', Crypt::encrypt($galeri->id_galeri)) }}"
                                       class="btn btn-sm btn-warning fw-bold"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class=""></i> Edit
                                    </a>
                                    <form action="{{ route('admin.galeri.destroy', Crypt::encrypt($galeri->id_galeri)) }}"
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
                            <td colspan="6">Tidak ada data galeri.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
