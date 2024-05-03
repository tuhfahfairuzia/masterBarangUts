<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode' => 'B001',
                'nama' => 'Telur',
                'harga' => 27000,
                'deskripsi' => 'Telur Kampung Omega',
                'satuan_barang' => 1
            ],
            [
                'kode' => 'B002',
                'nama' => 'Tepung',
                'harga' => 10000,
                'deskripsi' => 'Tepung rendah protein',
                'satuan_barang' => 2
            ],
            [
                'kode' => 'B003',
                'nama' => 'susu',
                'harga' => 17500,
                'deskripsi' => 'susu evaporasi',
                'satuan_barang' => 3
            ],
        ]);
    }
}
