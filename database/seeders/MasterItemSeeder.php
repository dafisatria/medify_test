<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = ['Tokopaedi', 'Bukulapuk', 'TokoBagas', 'E Commurz', 'Blublu'];
        $jenis = ['Obat', 'Alkes', 'Matkes', 'Umum', 'ATK'];

        for ($i = 1; $i <= 50; $i++) {
            $kode = str_pad($i, 5, '0', STR_PAD_LEFT);
            $nama = 'Item ' . $kode;
            $harga_beli = rand(100, 1000000);
            $laba = rand(10, 99);
            $supplier = $suppliers[array_rand($suppliers)];
            $jenis_item = $jenis[array_rand($jenis)];

            \App\Models\MasterItem::create([
                'kode' => $kode,
                'nama' => $nama,
                'harga_beli' => $harga_beli,
                'laba' => $laba,
                'supplier' => $supplier,
                'jenis' => $jenis_item,
                'foto' => null
            ]);
        }
    }
}
