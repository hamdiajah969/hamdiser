<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\profile_sekolah;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Dodoy',
            'username' => 'AdminKapal',
            'password' => bcrypt(1234),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'kodoy',
            'username' => 'Operator1',
            'password' => bcrypt(12345),
            'role' => 'operator'
        ]);
        profile_sekolah::create([
            'nama_sekolah' => 'SMK Kapal',
            'kepala_sekolah' => 'Budi Santoso',
            'foto'=>'logo.jpg',
            'logo'=>'nnn.jpg',
            'npsn' => '1234567890',
            'alamat' => 'Jl. Pendidikan No. 123, Kota Pendidikan',
            'kontak' => '021-12345678',
            'visi_misi' => 'Visi: Menjadi sekolah unggulan dalam bidang teknologi dan inovasi. Misi: 1. Meningkatkan kualitas pembelajaran. 2. Mengembangkan potensi siswa. 3. Membangun kerjasama dengan industri.',
            'tahun_berdiri' => 1996,
            'deskripsi' => 'SMK Kapal adalah sekolah menengah kejuruan yang berfokus pada pengembangan keterampilan teknis dan vokasional untuk mempersiapkan siswa menghadapi dunia kerja.',
            'created_at' => now(),
            'updated_at' => now()
           
        ]);

    }
}
