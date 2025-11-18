<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '2024001001',
            'nama' => 'Budi Santoso',
            'alamat' => 'Jalan Merdeka No. 123, Jakarta Pusat',
            'tanggal_lahir' => '2004-05-15',
            'jenis_kel' => 'Laki-laki',
            'prodi' => 'Teknik Informatika',
        ]);

        Mahasiswa::create([
            'nim' => '2024001002',
            'nama' => 'Siti Nurhaliza',
            'alamat' => 'Jalan Ahmad Yani No. 456, Bandung',
            'tanggal_lahir' => '2003-08-22',
            'jenis_kel' => 'Perempuan',
            'prodi' => 'Sistem Informasi',
        ]);

        Mahasiswa::create([
            'nim' => '2024001003',
            'nama' => 'Ahmad Rizki',
            'alamat' => 'Jalan Gatot Subroto No. 789, Surabaya',
            'tanggal_lahir' => '2005-02-10',
            'jenis_kel' => 'Laki-laki',
            'prodi' => 'Rekayasa Perangkat Lunak',
        ]);

        Mahasiswa::create([
            'nim' => '2024001004',
            'nama' => 'Rifa Asthiya',
            'alamat' => 'Jalan Sudirman No. 234, Medan',
            'tanggal_lahir' => '2004-11-03',
            'jenis_kel' => 'Perempuan',
            'prodi' => 'Teknik Informatika',
        ]);
    }
}
