<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/',[Controller::class, 'home'])->name('layouts.home');

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
});
