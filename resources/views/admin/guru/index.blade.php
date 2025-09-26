@extends('admin.layouts.admin')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <h5 class="fw-bold text-dark">Daftar Guru</h5>
        <a href="{{ route('admin.guru.create') }}"
           class="btn btn-primary rounded-3 fw-bold"
           style="background:#0d47a1;">
            Tambah
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
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th>Foto</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gurus as $guru)
                        <tr class="text-center">
                            <td>{{ $guru->id_guru }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->nama_guru }}</td>
                                <td>{{ $guru->mapel }}</td>
                           <td>
                                    @if($guru->foto)
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto" width="50" height="50" class="rounded-circle">
                                    @else
                                        <span class="badge bg-secondary">Tidak ada</span>
                                    @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.guru.edit', Crypt::encrypt($guru->id_guru)) }}"
                                       class="btn btn-sm btn-warning fw-bold"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <span class="fw-bold">Edit</span>
                                    </a>
                                    <form action="{{ route('admin.guru.destroy', Crypt::encrypt($guru->id_guru)) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger fw-bold"
                                                data-bs-toggle="tooltip" title="Hapus">
                                            <span class="fw-bold">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                <i class="fa-solid fa-circle-info"></i> Belum Ada Data Siswa
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

