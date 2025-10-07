@extends('layouts.home')
@section('content')
<section class="siswa">
    <div class="container">
        <!-- Breadcrumb sejajar dengan konten -->
        <div class="table-responsive mb-4" style="max-width:900px; margin:0 auto;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light p-3 rounded">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-decoration-none">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">
                        Siswa
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="table-responsive">
            <h2 class="fw-bold mb-4">Siswa SMA Cilampunghilir</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">No</th>
                        <th scope="col" style="width: 25%;">Nama</th>
                        <th scope="col" style="width: 30%;">Jenis Kelamin</th>
                        <th scope="col" style="width: 30%;">Tahun Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $index => $siswa)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $siswa->nama_siswa }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>{{$siswa->tahun_masuk}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</section>
<style>
    .siswa{
        padding-top:8%;
        margin-bottom:5%;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        color: orange;
    }
    .breadcrumb .breadcrumb-item a {
        color: #002147;
        font-weight: 600;
    }

    .breadcrumb .breadcrumb-item a:hover {
        color: #002147;
        text-decoration: underline;
    }
    .table-responsive {
    max-width: 900px;
    margin: 0 auto;
}
.table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
}
.table thead tr {
    background-color: #f8f9fa;
}
.table th, .table td {
    border: 1px solid #dee2e6;
    padding: 12px 15px;
    text-align: left;
}
.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}
.table tbody tr:hover {
    background-color: #e9ecef;
}
</style>
@endsection