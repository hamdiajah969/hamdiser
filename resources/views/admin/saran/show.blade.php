@extends('admin.layouts.admin')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <h5 class="fw-bold text-dark">Detail Saran</h5>
        <a href="{{ route('admin.saran.index') }}" class="btn btn-secondary" style="background:#002147; ">Kembali</a>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">ID Saran:</label>
                        <p class="form-control-plaintext">{{ $saran->id_saran }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama:</label>
                        <p class="form-control-plaintext">{{ $saran->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email:</label>
                        <p class="form-control-plaintext">{{ $saran->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Dibuat Pada:</label>
                        <p class="form-control-plaintext">{{ $saran->created_at->format('d-m-Y H:i:s') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Komentar:</label>
                        <div class="border p-3 rounded bg-light">{{ $saran->comment }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
