<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\profile_sekolah;
use App\Models\Berita;
use App\Models\Saran;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $countUser = User::count();
        $countSiswa = Siswa::count();
        $countGuru = Guru::count();
        $countEkstrakulikuler = Ekstrakulikuler::count();
        $countGaleri = Galeri::count();
        $countProfileSekolah = profile_sekolah::count();
        $countBerita = Berita::count();

        return view('admin.dashboard', compact(
            'countUser',
            'countSiswa',
            'countGuru',
            'countEkstrakulikuler',
            'countGaleri',
            'countProfileSekolah',
            'countBerita'
        ));
    }


    //----user----
    public function userView()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function editView(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $users = User::findOrFail($id);
        return view('admin.user.edit', compact('users'));
    }

    public function updateView(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $user = User::findOrFail($id);

        // ✅ validasi dengan pengecualian id yang sedang diedit
        $validasi = $request->validate([
            'name'     => 'required|string|max:225',
            'username' => 'required|string|max:225|unique:users,username,' . $user->getKey() . ',id_user',
            'password' => 'nullable|string|min:6',
            'role'     => 'required|in:admin,operator',
        ]);

        if ($request->filled('password')) {
            $validasi['password'] = bcrypt($request->password);
        } else {
            $validasi['password'] = $user->password;
        }

        $user->update($validasi);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Berhasil mengupdate data.');
    }

    public function userCreate()
    {
        return view('admin.user.create');
    }

    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,operator',
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function userDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus');
    }

    //----siswa----
    public function siswaIndex()
    {
        $siswas = Siswa::all();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function siswaCreate()
    {
        return view('admin.siswa.create');
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

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function siswaEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
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

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diupdate.');
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

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }

    //----guru-----
    public function guruIndex()
    {
        $gurus = Guru::all();
        return view('admin.guru.index', compact('gurus'));
    }

    public function guruCreate()
    {
        return view('admin.guru.create');
    }

    public function guruStore(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15|unique:gurus,nip',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('guru_foto', 'public');
            $validated['foto'] = $fotoPath;
        }

        Guru::create($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function guruEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function guruUpdate(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $guru = Guru::findOrFail($id);

        $validated = $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15|unique:gurus,nip,' . $guru->getKey() . ',id_guru',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('guru_foto', 'public');
            $validated['foto'] = $fotoPath;
        }

        $guru->update($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diupdate.');
    }

    public function guruDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus.');
    }

    //-----ekstrakulikuler-----
    public function ekstrakulikulerIndex()
    {
        $ekstrakulikulers = Ekstrakulikuler::all();
        return view('admin.ekstrakulikuler.index', compact('ekstrakulikulers'));
    }

    public function ekstrakulikulerCreate()
    {
        return view('admin.ekstrakulikuler.create');
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

        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Ekstrakulikuler berhasil ditambahkan.');
    }

    public function ekstrakulikulerEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('admin.ekstrakulikuler.edit', compact('ekstrakulikuler'));
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

        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Ekstrakulikuler berhasil diupdate.');
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

        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Ekstrakulikuler berhasil dihapus.');
    }

    //----galeri----
    public function galeriIndex()
    {
        $galeris = Galeri::all();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function galeriCreate()
    {
        return view('admin.galeri.create');
    }

    public function galeriStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255|unique:galeris,judul',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'file' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:204800',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('galeri_file', 'public');
            $validated['file'] = $filePath;
        }

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function galeriEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
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
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:204800',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('galeri_file', 'public');
            $validated['file'] = $filePath;
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate.');
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

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    //----profil sekolah----
    public function profileSekolahIndex()
    {
        $profileSekolahs = profile_sekolah::all();
        return view('admin.profile_sekolah.index', compact('profileSekolahs'));
    }

    public function profileSekolahCreate()
    {
        return view('admin.profile_sekolah.create');
    }

    public function profileSekolahStore(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'nullable|string|max:15',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profile_foto', 'public');
            $validated['foto'] = $fotoPath;
        }

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profile_logo', 'public');
            $validated['logo'] = $logoPath;
        }

        profile_sekolah::create($validated);

        return redirect()->route('admin.profile_sekolah.index')->with('success', 'Profile Sekolah berhasil ditambahkan.');
    }

    public function profileSekolahEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $profileSekolah = profile_sekolah::findOrFail($id);
        return view('admin.profile_sekolah.edit', compact('profileSekolah'));
    }

    public function profileSekolahUpdate(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $profileSekolah = profile_sekolah::findOrFail($id);

        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'nullable|string|max:15',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profile_foto', 'public');
            $validated['foto'] = $fotoPath;
        }

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profile_logo', 'public');
            $validated['logo'] = $logoPath;
        }

        $profileSekolah->update($validated);

        return redirect()->route('admin.profile_sekolah.index')->with('success', 'Profile Sekolah berhasil diupdate.');
    }

    public function profileSekolahDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $profileSekolah = profile_sekolah::findOrFail($id);
        $profileSekolah->delete();

        return redirect()->route('admin.profile_sekolah.index')->with('success', 'Profile Sekolah berhasil dihapus.');
    }

    //----berita----
    public function beritaIndex()
    {
        $beritas = Berita::with('user')->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function beritaCreate()
    {
        return view('admin.berita.create');
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

        // if ($request->hasFile('gambar')) {
        //     $fotoPath = $request->file('gambar')->store('guru_foto', 'public');
        //     $validated['gambar'] = $fotoPath;
        // }
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita_gambar', $filename, 'public');
            $data['gambar'] = 'berita_gambar/' . $filename;
        }

        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function beritaEdit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
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
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
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
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    //----saran----
    public function saranIndex()
    {
        $sarans = Saran::all();
        return view('admin.saran.index', compact('sarans'));
    }

    public function saranStore(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ]);

        Saran::create($validated);

        return redirect()->route('admin.saran.index');
    }

    public function saranShow(string $id)
    {
        $saran = Saran::findOrFail($id);
        return view('admin.saran.show', compact('saran'));
    }

    public function saranDestroy(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'ID tidak valid.');
        }

        $saran = Saran::findOrFail($id);
        $saran->delete();

        return redirect()->route('admin.saran.index')->with('success', 'Saran berhasil dihapus.');
    }

}
