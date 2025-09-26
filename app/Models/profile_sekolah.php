<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile_sekolah extends Model
{
    //
    protected $table = 'profile_sekolahs';
    protected $primaryKey = 'id_profil';
    protected $guarded = [];
     protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
