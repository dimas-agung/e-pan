<?php

namespace Database\Seeders;

use App\Models\Saksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaksiSeeder extends Seeder
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
                'kode_tps' => '001',
            ],


        ];
        Saksi::insert($data);
    }
}