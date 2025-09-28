<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;

class Controller
{
    //
    public function home(){
        $profile = profile_sekolah::first();
        return view('layouts.home', compact('profile'));
    }
}
