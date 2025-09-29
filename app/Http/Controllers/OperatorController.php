<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Siswa;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OperatorController extends Controller
{
    //
    public function dashboard(){
        $countSiswa = Siswa::count();
        $countEkstrakulikuler = Ekstrakulikuler::count();
        $countGaleri = Galeri::count();
        $countBerita = Berita::count();

        return view('operator.dashboard', compact(
            'countSiswa',
            'countEkstrakulikuler',
            'countGaleri',
            'countBerita'
        ));
    }

    //----siswa----
    public function siswaIndex()
    {
        $siswas = Siswa::all();
        return view('operator.siswa.index', compact('siswas'));
    }

    public function siswaCreate()
    {
        return view('operator.siswa.create');
    }

    public function siswaStore(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|max:10|unique:siswas,nisn',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        Siswa::create($validated);

        return redirect()->route('operator.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function siswaEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $siswa = Siswa::findOrFail($id);
        return view('operator.siswa.edit', compact('siswa'));
    }

    public function siswaUpdate(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nisn' => 'required|string|max:10|unique:siswas,nisn,' . $siswa->getKey() . ',id_siswa',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $siswa->update($validated);

        return redirect()->route('operator.siswa.index')->with('success', 'Siswa berhasil diupdate.');
    }

    public function siswaDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('operator.siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }

    //----ekstrakulikuler----
    public function ekstrakulikulerIndex()
    {
        $ekstrakulikulers = Ekstrakulikuler::all();
        return view('operator.ekstrakulikuler.index', compact('ekstrakulikulers'));
    }

    public function ekstrakulikulerCreate()
    {
        return view('operator.ekstrakulikuler.create');
    }

    public function ekstrakulikulerStore(Request $request)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('ekstrakulikuler_gambar', 'public');
            $validated['gambar'] = $gambarPath;
        }

        Ekstrakulikuler::create($validated);

        return redirect()->route('operator.ekstrakulikuler.index')->with('success', 'Ekstrakulikuler berhasil ditambahkan.');
    }

    public function ekstrakulikulerEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('operator.ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function ekstrakulikulerUpdate(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('ekstrakulikuler_gambar', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $ekstrakulikuler->update($validated);

        return redirect()->route('operator.ekstrakulikuler.index')->with('success', 'Ekstrakulikuler berhasil diupdate.');
    }

    public function ekstrakulikulerDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        $ekstrakulikuler->delete();

        return redirect()->route('operator.ekstrakulikuler.index')->with('success', 'Ekstrakulikuler berhasil dihapus.');
    }

    //----berita----
    public function beritaIndex()
    {
        $beritas = Berita::with('user')->get();
        return view('operator.berita.index', compact('beritas'));
    }

    public function beritaCreate()
    {
        return view('operator.berita.create');
    }

    public function beritaStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'tanggal']);
        $data['id_user'] = Auth::user()->id_user;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita_gambar', $filename, 'public');
            $data['gambar'] = 'berita_gambar/' . $filename;
        }

        Berita::create($data);
        return redirect()->route('operator.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function beritaEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $berita = Berita::findOrFail($id);
        return view('operator.berita.edit', compact('berita'));
    }

    public function beritaUpdate(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'tanggal']);

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($berita->gambar && file_exists(storage_path('app/public/' . $berita->gambar))) {
                unlink(storage_path('app/public/' . $berita->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita_gambar', $filename, 'public');
            $data['gambar'] = 'berita_gambar/' . $filename;
        }

        $berita->update($data);
        return redirect()->route('operator.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function beritaDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $berita = Berita::findOrFail($id);
        if ($berita->gambar && file_exists(storage_path('app/public/' . $berita->gambar))) {
            unlink(storage_path('app/public/' . $berita->gambar));
        }
        $berita->delete();
        return redirect()->route('operator.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    //---galeri---
    public function galeriIndex()
    {
        $galeris = Galeri::all();
        return view('operator.galeri.index', compact('galeris'));
    }

    public function galeriCreate()
    {
        return view('operator.galeri.create');
    }

    public function galeriStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255|unique:galeris,judul',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('galeri_file', 'public');
            $validated['file'] = $filePath;
        }

        Galeri::create($validated);

        return redirect()->route('operator.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function galeriEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $galeri = Galeri::findOrFail($id);
        return view('operator.galeri.edit', compact('galeri'));
    }

    public function galeriUpdate(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255|unique:galeris,judul,' . $galeri->getKey() . ',id_galeri',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('galeri_file', 'public');
            $validated['file'] = $filePath;
        }

        $galeri->update($validated);

        return redirect()->route('operator.galeri.index')->with('success', 'Galeri berhasil diupdate.');
    }

    public function galeriDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->route('operator.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
