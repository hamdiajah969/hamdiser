<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ekstrakulikuler - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #002147;
            --primary-light: #003366;
            --secondary: #e0a000;
            --secondary-light: #f0b030;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border: #e2e8f0;
            --success: #10b981;
            --error: #ef4444;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: var(--text-primary);
            line-height: 1.5;
            padding: 1rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .admin-container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .admin-card {
            background: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-bottom: none;
            padding: 1.5rem 2rem;
        }
        
        .card-header h5 {
            font-weight: 600;
            font-size: 1.2rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .teacher-section {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 10px;
            border: 1px solid var(--border);
        }
        
        .teacher-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.2rem;
            border: 4px solid white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .teacher-info {
            margin-top: 0.75rem;
        }
        
        .teacher-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
            margin-bottom: 0.4rem;
        }
        
        .teacher-role {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        
        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }
        
        .form-section:last-of-type {
            border-bottom: none;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border);
        }
        
        .section-title i {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .required-field::after {
            content: " *";
            color: var(--error);
            font-weight: bold;
        }
        
        .form-control {
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            background-color: #fff;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 33, 71, 0.1);
            outline: none;
        }
        
        .form-control.is-invalid {
            border-color: var(--error);
        }
        
        .input-group-text {
            background-color: var(--light-bg);
            border: 1px solid var(--border);
            border-right: none;
            color: var(--text-secondary);
            font-size: 0.9rem;
            padding: 0.75rem 1rem;
        }
        
        .input-group .form-control {
            border-left: none;
        }
        
        .invalid-feedback {
            font-size: 0.8rem;
            margin-top: 0.4rem;
            color: var(--error);
            display: block;
        }
        
        .image-preview-container {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .current-image {
            border-radius: 8px;
            border: 2px solid var(--border);
            padding: 4px;
            background: white;
            max-width: 150px;
            height: auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .image-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }
        
        .file-input-wrapper {
            border: 2px dashed var(--border);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            background: var(--light-bg);
            margin-bottom: 1rem;
        }
        
        .file-input-wrapper:hover {
            border-color: var(--primary);
            background: rgba(0, 33, 71, 0.03);
        }
        
        .file-upload-icon {
            font-size: 1.75rem;
            color: var(--primary);
            margin-bottom: 0.75rem;
        }
        
        .file-upload-text {
            color: var(--text-secondary);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 0.5rem;
        }
        
        .file-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: white;
            cursor: pointer;
        }
        
        .file-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 33, 71, 0.1);
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }
        
        .btn {
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 33, 71, 0.2);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--secondary-light) 100%);
            color: white;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(224, 160, 0, 0.2);
        }
        
        .info-note {
            background-color: rgba(59, 130, 246, 0.05);
            border: 1px solid rgba(59, 130, 246, 0.15);
            border-radius: 8px;
            padding: 1rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-top: 1rem;
        }
        
        .info-note i {
            color: #3b82f6;
            margin-top: 0.1rem;
            font-size: 0.9rem;
        }
        
        .form-text {
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.4rem;
        }
        
        .row {
            margin-left: -0.75rem;
            margin-right: -0.75rem;
        }
        
        .row > [class*="col-"] {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 0.75rem;
                align-items: flex-start;
            }
            
            .admin-container {
                width: 95%;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .card-header {
                padding: 1.25rem 1.5rem;
            }
            
            .card-header h5 {
                font-size: 1.1rem;
            }
            
            .teacher-avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .form-actions .btn {
                width: 100%;
                justify-content: center;
            }
            
            .section-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1.25rem;
            }
            
            .teacher-section {
                padding: 1.25rem;
                margin-bottom: 1.5rem;
            }
            
            .file-input-wrapper {
                padding: 1.25rem;
            }
        }
        
        /* Print styles */
        @media print {
            .btn-secondary {
                display: none;
            }
            
            .file-input-wrapper {
                border: 1px solid #ccc;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-card">
            <div class="card-header text-white">
                <h5>
                    <i class="fas fa-edit"></i>
                    Edit Ekstrakulikuler
                </h5>
            </div>
            <div class="card-body">
                <!-- Teacher Section -->
                <div class="teacher-section">
                    <div class="teacher-avatar">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="teacher-info">
                        <div class="teacher-name">Bapak Andi Wijaya, S.Pd.</div>
                        <div class="teacher-role">Pembina Ekstrakulikuler Basket</div>
                    </div>
                </div>

                <form action="{{ route('admin.ekstrakulikuler.update', Crypt::encrypt($ekstrakulikuler->id_ekskul)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Umum Section -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-info-circle"></i>
                            <span>Informasi Umum</span>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_ekskul" class="form-label required-field">Nama Ekstrakulikuler</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    <input type="text" class="form-control @error('nama_ekskul') is-invalid @enderror" id="nama_ekskul" name="nama_ekskul" value="{{ old('nama_ekskul', $ekstrakulikuler->nama_ekskul) }}" required>
                                </div>
                                @error('nama_ekskul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="pembina" class="form-label required-field">Pembina</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control @error('pembina') is-invalid @enderror" id="pembina" name="pembina" value="{{ old('pembina', $ekstrakulikuler->pembina) }}" required>
                                </div>
                                @error('pembina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jadwal_latihan" class="form-label required-field">Jadwal Latihan</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" class="form-control @error('jadwal_latihan') is-invalid @enderror" id="jadwal_latihan" name="jadwal_latihan" value="{{ old('jadwal_latihan', $ekstrakulikuler->jadwal_latihan) }}" required>
                            </div>
                            @error('jadwal_latihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Contoh: Senin & Rabu, 15:00 - 17:00</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $ekstrakulikuler->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Gambar Section -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-image"></i>
                            <span>Gambar Ekstrakulikuler</span>
                        </div>
                        
                        @if($ekstrakulikuler->gambar)
                            <div class="image-preview-container">
                                <label class="form-label">Gambar Saat Ini</label>
                                <div>
                                    <img src="{{ asset('storage/' . $ekstrakulikuler->gambar) }}" alt="Gambar Ekstrakulikuler" class="current-image">
                                </div>
                            </div>
                        @endif
                        
                        <div class="file-input-wrapper">
                            <div class="file-upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="file-upload-text">
                                Pilih gambar baru untuk ekstrakulikuler
                            </div>
                            <input type="file" class="file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                        </div>
                        
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <div class="info-note">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <strong>Catatan:</strong> Biarkan kosong jika tidak ingin mengubah gambar. 
                                Format yang didukung: JPG, PNG, GIF. Ukuran maksimal: 2MB.
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.ekstrakulikuler.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Daftar</span>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


//edit biasa
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background: #002147;">
                    <h5 class="mb-0 fw-bold">Edit Ekstrakulikuler</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ekstrakulikuler.update', Crypt::encrypt($ekstrakulikuler->id_ekskul)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
                            <input type="text" class="form-control @error('nama_ekskul') is-invalid @enderror" id="nama_ekskul" name="nama_ekskul" value="{{ old('nama_ekskul', $ekstrakulikuler->nama_ekskul) }}" required>
                            @error('nama_ekskul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pembina" class="form-label">Pembina</label>
                            <input type="text" class="form-control @error('pembina') is-invalid @enderror" id="pembina" name="pembina" value="{{ old('pembina', $ekstrakulikuler->pembina) }}" required>
                            @error('pembina')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
                            <input type="text" class="form-control @error('jadwal_latihan') is-invalid @enderror" id="jadwal_latihan" name="jadwal_latihan" value="{{ old('jadwal_latihan', $ekstrakulikuler->jadwal_latihan) }}" required>
                            @error('jadwal_latihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $ekstrakulikuler->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            @if($ekstrakulikuler->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $ekstrakulikuler->gambar) }}" alt="Gambar Lama" width="100" height="100" class="rounded">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.ekstrakulikuler.index') }}" class="btn text-white fw-bold" style="background: #e0a000;">Kembali</a>
                            <button type="submit" class="btn text-white fw-bold" style="background: #002147">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>