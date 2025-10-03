@extends('layouts.index')
@section('content')
@if ($profile)
<section class="vm">
    <div class="container">
        <div class="vm-content">
            <h2>Visi & Misi</h2>
            <p>{{ $profile->visi_misi }}</p>
        </div>
    </div>
</section>
@endif

<style>
.vm {
    padding-top: 8%;
    margin-bottom: 5%;}
.vm-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: justify;
    line-height: 1.9;
    color: #333;
    position: relative;
    animation: fadeInUp 1s ease-out;
}
.vm-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #002147;
    text-align: center;
    position: relative;
}
.vm-content h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background: #002147;
    margin: 12px auto 0;
    border-radius: 2px;
}
.vm-content p {
    font-size: 1.15rem;
    white-space: pre-line;
    text-align: justify;
    color: #444;
    margin-top: 15px;
}


</style>
@endsection
