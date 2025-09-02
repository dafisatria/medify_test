<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            $kode = str_pad($i, 5, '0', STR_PAD_LEFT);
            $nama = 'Item ' . $kode;

            \App\Models\KategoriItems::create([
                'kode' => $kode,
                'nama' => $nama,
            ]);
        }
    }
}
