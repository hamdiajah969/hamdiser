<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;

class Controller
{
    //
    public function home(){
        $profile = profile_sekolah::first();
        $gurus = Guru::all();
        $siswas = Siswa::all();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $ekstrakulikulers = Ekstrakulikuler::orderBy('nama_ekskul')->get();
        return view('layouts.home', compact('profile', 'gurus', 'siswas', 'beritas', 'ekstrakulikulers'));
    }
}
