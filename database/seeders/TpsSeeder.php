<?php

namespace Database\Seeders;

use App\Models\Tps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'kode_tps' => '001',
                'lokasi' => 'jombang',
            ],


        ];
        Tps::insert($data);
    }
}