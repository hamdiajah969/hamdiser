@extends('layouts.index')
@section('content')

@if(isset($gurus) && $gurus->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <h2 class=" mb-4 fw-bold text-black">Tenaga Pendidik</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">No</th>
                        <th scope="col" style="width: 1%;">Foto</th>
                        <th scope="col" style="width: 25%;">Nama</th>
                        <th scope="col" style="width: 30%;">Mata Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gurus as $index => $guru)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            @if($guru->foto)
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" style="height: 60px; width: auto; object-fit: cover;">
                            @else
                            <img src="{{ asset('assets/foto/guru.jpg') }}" alt="No Photo" style="height: 60px; width: auto; object-fit: cover;">
                            @endif
                        </td>
                        <td>{{ $guru->nama_guru }}</td>
                        <td>{{ $guru->mapel }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

@endsection
