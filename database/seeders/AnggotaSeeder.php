<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'nik' => '4782821921123',
                'nama' => 'Puspita',
                'tempat_lahir' => 'Jombang',
                'tanggal_lahir' => '1999-08-10',
                'gender' => 'Perempuan',
                'agama' => 'Islam',
                'golongan_darah' => 'B',
                'status_perkawinan' => 'Belum Menikah',
                'pendidikan' => 'Sarjana',
                'institusi_pendidikan' => 'Universitas Negeri',
                'pekerjaan' => 'Swasta',
                'telpon' => '0812312312',
                'sayap_pan' => '',
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Jombang',
                'kecamatan' => 'Jombang',
                'desa' => 'Jombang',
                'rt' => '01',
                'rw' => '01',
                'alamat' => 'dusun jombang',
            ],


        ];
        Anggota::insert($data);
    }
}