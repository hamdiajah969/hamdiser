<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Saran;
use Illuminate\Http\Request;

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

    public function beritaDetail($id){
        $berita = Berita::with('user')->findOrFail($id);
        $profile = profile_sekolah::first();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::whereIn('kategori', ['foto', 'video'])->orderBy('tanggal', 'desc')->get();
        return view('berita.detail', compact('berita', 'profile', 'beritas', 'galeris'));
    }

    public function galeri(){
        $berita = Berita::with('user');
        $profile = profile_sekolah::first();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::whereIn('kategori', ['foto', 'video'])->orderBy('tanggal', 'desc')->get();
        return view('layouts.galeri', compact('beritas', 'profile', 'galeris'));
    }

    public function ekskul(){
        $berita = Berita::with('user');
        $profile = profile_sekolah::first();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::whereIn('kategori', ['foto', 'video'])->orderBy('tanggal', 'desc')->get();
        $ekstrakulikulers = Ekstrakulikuler::orderBy('nama_ekskul')->get();

        return view('layouts.ekstrakulikuler', compact('beritas', 'profile', 'galeris', 'ekstrakulikulers'));
    }

    public function tentang(){
        $berita = Berita::with('user');
        $profile = profile_sekolah::first();
        $beritas = Berita::with('user')->orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::whereIn('kategori', ['foto', 'video'])->orderBy('tanggal', 'desc')->get();
        return view('profile.tentang', compact('beritas', 'profile', 'galeris'));
    }

    public function visimisi(){
        return view('profile.visimisi');
    }

    public function storeSaran(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
            'author' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ]);

        Saran::create([
            'comment' => $validated['comment'],
            'name' => $validated['author'],
            'email' => $validated['email'],
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas saran Anda!');
    }


}
