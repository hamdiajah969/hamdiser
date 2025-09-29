<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;
use App\Models\Guru;
use App\Models\Siswa;

class Controller
{
    //
    public function home(){
        $profile = profile_sekolah::first();
        $gurus = Guru::all();
        $siswas = Siswa::all();
        return view('layouts.home', compact('profile', 'gurus', 'siswas'));
    }
}
