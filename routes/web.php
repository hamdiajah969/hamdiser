<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Route;

Route::get('/',[Controller::class, 'home'])->name('layouts.home');
Route::get('/guru',[Controller::class, 'guru'])->name('layouts.guru');
Route::get('/berita/{id}', [Controller::class, 'beritaDetail'])->name('berita.detail');
Route::get('/galeri', [Controller::class, 'galeri'])->name('layouts.galeri');
Route::get('/ekskul',[Controller::class, 'ekskul'])->name('layouts.ektrakulikuler');
Route::get('/tentang', [Controller::class, 'tentang'])->name('profile.tentang');
Route::get('/visimisi', [Controller::class, 'visimisi'])->name('profile.visimisi');
Route::post('/saran', [Controller::class, 'storeSaran'])->name('saran.store');



// Auth routes
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth',[AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function (){
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');

    //user
    Route::get('/admin/user', [AdminController::class, 'userView'])->name('admin.user.index');
    Route::get('/admin/user/create', [AdminController::class, 'userCreate'])->name('admin.user.create');
    Route::post('/admin/user', [AdminController::class, 'userStore'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}',[AdminController::class,'editView'])->name('admin.user.edit');
    Route::put('/admin/user/edit/{id}',[AdminController::class, 'updateView'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'userDestroy'])->name('admin.user.destroy');

    //siswa
    Route::get('/admin/siswa', [AdminController::class, 'siswaindex'])->name('admin.siswa.index');
    Route::get('/admin/siswa/create', [AdminController::class, 'siswaCreate'])->name('admin.siswa.create');
    Route::post('/admin/siswa', [AdminController::class, 'siswaStore'])->name('admin.siswa.store');
    Route::get('/admin/siswa/edit/{id}',[AdminController::class,'siswaEdit'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/edit/{id}',[AdminController::class, 'siswaUpdate'])->name('admin.siswa.update');
    Route::delete('/admin/siswa/{id}', [AdminController::class, 'siswaDestroy'])->name('admin.siswa.destroy');

    //guru
    Route::get('/admin/guru', [AdminController::class, 'guruIndex'])->name('admin.guru.index');
    Route::get('/admin/guru/create', [AdminController::class, 'guruCreate'])->name('admin.guru.create');
    Route::post('/admin/guru', [AdminController::class, 'guruStore'])->name('admin.guru.store');
    Route::get('/admin/guru/edit/{id}',[AdminController::class,'guruEdit'])->name('admin.guru.edit');
    Route::put('/admin/guru/edit/{id}',[AdminController::class, 'guruUpdate'])->name('admin.guru.update');
    Route::delete('/admin/guru/{id}', [AdminController::class, 'guruDestroy'])->name('admin.guru.destroy');

    //ekstrakulikuler
    Route::get('/admin/ekstrakulikuler', [AdminController::class, 'ekstrakulikulerIndex'])->name('admin.ekstrakulikuler.index');
    Route::get('/admin/ekstrakulikuler/create', [AdminController::class, 'ekstrakulikulerCreate'])->name('admin.ekstrakulikuler.create');
    Route::post('/admin/ekstrakulikuler', [AdminController::class, 'ekstrakulikulerStore'])->name('admin.ekstrakulikuler.store');
    Route::get('/admin/ekstrakulikuler/edit/{id}',[AdminController::class,'ekstrakulikulerEdit'])->name('admin.ekstrakulikuler.edit');
    Route::put('/admin/ekstrakulikuler/edit/{id}',[AdminController::class, 'ekstrakulikulerUpdate'])->name('admin.ekstrakulikuler.update');
    Route::delete('/admin/ekstrakulikuler/{id}', [AdminController::class, 'ekstrakulikulerDestroy'])->name('admin.ekstrakulikuler.destroy');

    //galeri
    Route::get('/admin/galeri', [AdminController::class, 'galeriIndex'])->name('admin.galeri.index');
    Route::get('/admin/galeri/create', [AdminController::class, 'galeriCreate'])->name('admin.galeri.create');
    Route::post('/admin/galeri', [AdminController::class, 'galeriStore'])->name('admin.galeri.store');
    Route::get('/admin/galeri/edit/{id}',[AdminController::class,'galeriEdit'])->name('admin.galeri.edit');
    Route::put('/admin/galeri/edit/{id}',[AdminController::class, 'galeriUpdate'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{id}', [AdminController::class, 'galeriDestroy'])->name('admin.galeri.destroy');

    //profile_sekolah
    Route::get('/admin/profile_sekolah', [AdminController::class, 'profileSekolahIndex'])->name('admin.profile_sekolah.index');
    Route::get('/admin/profile_sekolah/create', [AdminController::class, 'profileSekolahCreate'])->name('admin.profile_sekolah.create');
    Route::post('/admin/profile_sekolah', [AdminController::class, 'profileSekolahStore'])->name('admin.profile_sekolah.store');
    Route::get('/admin/profile_sekolah/edit/{id}',[AdminController::class,'profileSekolahEdit'])->name('admin.profile_sekolah.edit');
    Route::put('/admin/profile_sekolah/edit/{id}',[AdminController::class, 'profileSekolahUpdate'])->name('admin.profile_sekolah.update');
    Route::delete('/admin/profile_sekolah/{id}', [AdminController::class, 'profileSekolahDestroy'])->name('admin.profile_sekolah.destroy');

    //berita
    Route::get('/admin/berita', [AdminController::class, 'beritaIndex'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [AdminController::class, 'beritaCreate'])->name('admin.berita.create');
    Route::post('/admin/berita', [AdminController::class, 'beritaStore'])->name('admin.berita.store');
    Route::get('/admin/berita/edit/{id}',[AdminController::class,'beritaEdit'])->name('admin.berita.edit');
    Route::put('/admin/berita/edit/{id}',[AdminController::class, 'beritaUpdate'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [AdminController::class, 'beritaDestroy'])->name('admin.berita.destroy');

    //saran
    Route::get('/admin/saran', [AdminController::class, 'saranIndex'])->name('admin.saran.index');
    Route::get('/admin/saran/create', [AdminController::class, 'saranCreate'])->name('admin.saran.create');
    Route::post('/admin/saran', [AdminController::class, 'saranStore'])->name('admin.saran.store');
    Route::get('/admin/saran/{id}', [AdminController::class, 'saranShow'])->name('admin.saran.show');
    Route::delete('/admin/saran/{id}', [AdminController::class, 'saranDestroy'])->name('admin.saran.destroy');
});

Route::middleware(['operator'])->group(function (){
    Route::get('/operator/dashboard', [OperatorController::class, 'dashboard'])->name('operator.dashboard');

    //siswa
    Route::get('/operator/siswa', [OperatorController::class, 'siswaindex'])->name('operator.siswa.index');
    Route::get('/operator/siswa/create', [OperatorController::class, 'siswaCreate'])->name('operator.siswa.create');
    Route::post('/operator/siswa', [OperatorController::class, 'siswaStore'])->name('operator.siswa.store');
    Route::get('/operator/siswa/edit/{id}',[OperatorController::class,'siswaEdit'])->name('operator.siswa.edit');
    Route::put('/operator/siswa/edit/{id}',[OperatorController::class, 'siswaUpdate'])->name('operator.siswa.update');
    Route::delete('/operator/siswa/{id}', [OperatorController::class, 'siswaDestroy'])->name('operator.siswa.destroy');

    //ekstrakulikuler
    Route::get('/operator/ekstrakulikuler', [OperatorController::class, 'ekstrakulikulerIndex'])->name('operator.ekstrakulikuler.index');
    Route::get('/operator/ekstrakulikuler/create', [OperatorController::class, 'ekstrakulikulerCreate'])->name('operator.ekstrakulikuler.create');
    Route::post('/operator/ekstrakulikuler', [OperatorController::class, 'ekstrakulikulerStore'])->name('operator.ekstrakulikuler.store');
    Route::get('/operator/ekstrakulikuler/edit/{id}',[OperatorController::class,'ekstrakulikulerEdit'])->name('operator.ekstrakulikuler.edit');
    Route::put('/operator/ekstrakulikuler/edit/{id}',[OperatorController::class, 'ekstrakulikulerUpdate'])->name('operator.ekstrakulikuler.update');
    Route::delete('/operator/ekstrakulikuler/{id}', [OperatorController::class, 'ekstrakulikulerDestroy'])->name('operator.ekstrakulikuler.destroy');

    //berita
    Route::get('/operator/berita', [OperatorController::class, 'beritaIndex'])->name('operator.berita.index');
    Route::get('/operator/berita/create', [OperatorController::class, 'beritaCreate'])->name('operator.berita.create');
    Route::post('/operator/berita', [OperatorController::class, 'beritaStore'])->name('operator.berita.store');
    Route::get('/operator/berita/edit/{id}',[OperatorController::class,'beritaEdit'])->name('operator.berita.edit');
    Route::put('/operator/berita/edit/{id}',[OperatorController::class, 'beritaUpdate'])->name('operator.berita.update');
    Route::delete('/operator/berita/{id}', [OperatorController::class, 'beritaDestroy'])->name('operator.berita.destroy');

    //galeri
    Route::get('/operator/galeri', [OperatorController::class, 'galeriIndex'])->name('operator.galeri.index');
    Route::get('/operator/galeri/create', [OperatorController::class, 'galeriCreate'])->name('operator.galeri.create');
    Route::post('/operator/galeri', [OperatorController::class, 'galeriStore'])->name('operator.galeri.store');
    Route::get('/operator/galeri/edit/{id}',[OperatorController::class,'galeriEdit'])->name('operator.galeri.edit');
    Route::put('/operator/galeri/edit/{id}',[OperatorController::class, 'galeriUpdate'])->name('operator.galeri.update');
    Route::delete('/operator/galeri/{id}', [OperatorController::class, 'galeriDestroy'])->name('operator.galeri.destroy');

});
