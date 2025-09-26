@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Galeri</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.galeri.update', Crypt::encrypt($galeri->id_galeri)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Foto" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>Foto</option>
                                <option value="Video" {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>Video</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $galeri->tanggal) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            @if($galeri->file)
                                <div class="mb-2">
                                    @if($galeri->kategori === 'Foto')
                                        <img src="{{ asset('storage/' . $galeri->file) }}" alt="File Lama" width="100" height="100" class="rounded">
                                    @else
                                        <span class="badge bg-info fs-6">Video: {{ $galeri->file }}</span>
                                    @endif
                                </div>
                            @endif
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept="image/*">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
