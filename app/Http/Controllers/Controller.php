<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;

class Controller
{
    //
    public function home(){
        $profile = profile_sekolah::first();
        $gurus = Guru::all();
        $siswas = Siswa::all();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $ekstrakulikulers = Ekstrakulikuler::orderBy('nama_ekskul')->get();
        $galeris = Galeri::whereIn('kategori', ['foto', 'video'])->orderBy('tanggal', 'desc')->get();
        return view('layouts.home', compact('profile', 'gurus', 'siswas', 'beritas', 'ekstrakulikulers', 'galeris'));
    }


    public function guru(){
        $profile = profile_sekolah::first();
        $gurus = Guru::all();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::whereIn('kategori', ['foto', 'video'])->orderBy('tanggal', 'desc')->get();
        return view('layouts.guru', compact('profile','gurus', 'beritas', 'galeris'));
    }


}
