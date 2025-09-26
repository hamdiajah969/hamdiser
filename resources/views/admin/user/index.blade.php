@extends('admin.layouts.admin')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <h5 class="fw-bold text-dark">Daftar User</h5>
        <a href="{{ route('admin.user.create') }}"
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $item->name }}</td>
                            <td class="fw-semibold">{{ $item->username }}</td>
                            {{-- Demi keamanan jangan tampilkan password asli --}}
                            <td>******</td>
                            <td>
                                <span class="badge {{ $item->role == 'admin' ? 'bg-primary' : 'bg-success' }}">
                                    {{ ucfirst($item->role) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.user.edit', Crypt::encrypt($item->id_user)) }}"
                                       class="btn btn-sm btn-warning fw-bold"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <span class="fw-bold">Edit</span>
                                    </a>
                                    <form action="{{ route('admin.user.destroy', Crypt::encrypt($item->id_user)) }}"
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
                                <i class="fa-solid fa-circle-info"></i> Belum Ada Data User
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
