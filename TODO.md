# TODO for Galeri CRUD Implementation

1. [x] Edit app/Http/Controllers/AdminController.php: Add `use App\Models\Galeri;` import.
2. [x] Add `galeriIndex()` method: Fetch all galeris and return index view.
3. [x] Add `galeriCreate()` method: Return create view.
4. [x] Add `galeriStore(Request $request)` method: Validate fields (judul required unique, keterangan nullable, kategori required in ['Foto','Video'], tanggal required date, file nullable image), handle file upload to 'galeri_file', create Galeri model.
5. [x] Add `galeriEdit(string $id)` method: Decrypt ID, find Galeri, return edit view.
6. [x] Add `galeriUpdate(Request $request, string $id)` method: Decrypt ID, find Galeri, validate (judul unique except self), handle optional file upload/replace, update model.
7. [x] Add `galeriDestroy(string $id)` method: Decrypt ID, find and delete Galeri.
8. [x] Edit routes/web.php: Add Route::group for galeri CRUD (index, create, store, edit/{id}, update/{id}, destroy/{id}) under middleware('admin'), named admin.galeri.*.
9. [x] Create resources/views/admin/galeri/index.blade.php: Similar to ekstrakulikuler/index, table with ID, Judul, Kategori, Tanggal, File (img preview if Foto, else icon), Aksi (edit/delete with Crypt).
10. [x] Create resources/views/admin/galeri/create.blade.php: @extends admin.layouts.admin, form with judul (text), keterangan (textarea), kategori (select: Foto, Video), tanggal (date), file (file input), submit to store.
11. [x] Create resources/views/admin/galeri/edit.blade.php: Similar to create, pre-fill values from $galeri, optional file, submit to update.
12. [x] Edit resources/views/admin/layouts/sidebar.blade.php: Add <li> after Ekstrakulikuler: <a href="{{ route('admin.galeri.index') }}"><i class="bi bi-images"></i> Galeri</a>.
13. [x] Followup: Run `php artisan route:list | grep galeri` to verify routes, test CRUD in browser (navigate sidebar, add/edit/delete, check file upload/storage link).

# TODO for Profile Sekolah CRUD Implementation

1. [x] Edit app/Http/Controllers/AdminController.php: Add `use App\Models\profile_sekolah;` import.
2. [x] Add `profileSekolahIndex()` method: Fetch all profileSekolahs and return index view.
3. [x] Add `profileSekolahCreate()` method: Return create view.
4. [x] Add `profileSekolahStore(Request $request)` method: Validate fields (nama_sekolah required, kepala_sekolah required, foto nullable image, logo nullable image, npsn required, alamat required, kontak nullable, visi_misi nullable, tahun_berdiri nullable integer, deskripsi nullable), handle file uploads to 'profile_foto' and 'profile_logo', create profile_sekolah model.
5. [x] Add `profileSekolahEdit(string $id)` method: Decrypt ID, find profileSekolah, return edit view.
6. [x] Add `profileSekolahUpdate(Request $request, string $id)` method: Decrypt ID, find profileSekolah, validate, handle optional file uploads/replace, update model.
7. [x] Add `profileSekolahDestroy(string $id)` method: Decrypt ID, find and delete profileSekolah.
8. [x] Edit routes/web.php: Add Route::group for profile_sekolah CRUD (index, create, store, edit/{id}, update/{id}, destroy/{id}) under middleware('admin'), named admin.profile_sekolah.*.
9. [x] Create resources/views/admin/profile_sekolah/index.blade.php: Table with ID, Nama Sekolah, Kepala Sekolah, NPSN, Alamat, Foto, Logo, Aksi (edit/delete with Crypt).
10. [x] Create resources/views/admin/profile_sekolah/create.blade.php: @extends admin.layouts.admin, form with all fields, file inputs for foto and logo, submit to store.
11. [x] Create resources/views/admin/profile_sekolah/edit.blade.php: Similar to create, pre-fill values from $profileSekolah, optional files, submit to update.
12. [x] Edit resources/views/admin/layouts/sidebar.blade.php: Update Profile Sekolah link to route.
13. [x] Followup: Run `php artisan route:list --name=profile_sekolah` to verify routes, test CRUD in browser (navigate sidebar, add/edit/delete, check file upload/storage link).

# TODO for Berita CRUD Implementation

1. [x] Edit app/Http/Controllers/AdminController.php: Add `use App\Models\Berita;` import.
2. [x] Add `beritaIndex()` method: Fetch all beritas with user and return index view.
3. [x] Add `beritaCreate()` method: Return create view.
4. [x] Add `beritaStore(Request $request)` method: Validate fields (judul required max 50, isi required, tanggal required date, gambar nullable image), set id_user to Auth::user()->id_user, handle file upload to 'berita_gambar', create Berita model.
5. [x] Add `beritaEdit(string $id)` method: Decrypt ID, find Berita, return edit view.
6. [x] Add `beritaUpdate(Request $request, string $id)` method: Decrypt ID, find Berita, validate, handle optional file upload/replace, update model.
7. [x] Add `beritaDestroy(string $id)` method: Decrypt ID, find and delete Berita, delete gambar file.
8. [x] Edit routes/web.php: Add Route::group for berita CRUD (index, create, store, edit/{id}, update/{id}, destroy/{id}) under middleware('admin'), named admin.berita.*.
9. [x] Create resources/views/admin/berita/index.blade.php: Table with ID, Judul, Isi (truncated), Tanggal, Gambar, Penulis (user->name), Aksi (edit/delete with Crypt).
10. [x] Create resources/views/admin/berita/create.blade.php: @extends admin.layouts.admin, form with judul, isi, tanggal, gambar, submit to store.
11. [x] Create resources/views/admin/berita/edit.blade.php: Similar to create, pre-fill values from $berita, optional gambar, submit to update.
12. [x] Edit resources/views/admin/layouts/sidebar.blade.php: Add Berita link.
13. [x] Followup: Run `php artisan route:list --name=berita` to verify routes, test CRUD in browser (navigate sidebar, add/edit/delete, check file upload/storage link).

# TODO for Admin Dashboard Counts

1. [x] Edit app/Http/Controllers/AdminController.php: Change method name to admin() to match route, add counts for User, Siswa, Guru, Ekstrakulikuler, Galeri, profile_sekolah, Berita using ::count(), pass to view with compact.
2. [x] Edit resources/views/admin/dashboard.blade.php: Replace placeholder cards with 7 cards (2 rows: 4 and 3) displaying counts with appropriate icons (bi-person-circle, bi-person, bi-person-badge, bi-trophy, bi-images, bi-building, bi-newspaper) and colors.
3. [x] Followup: Fixed route to call admin() method, test dashboard loads with counts displayed correctly.

# TODO for Sidebar Logout

1. [x] Edit resources/views/admin/layouts/sidebar.blade.php: Change "Charts" link to logout with POST form submission.
