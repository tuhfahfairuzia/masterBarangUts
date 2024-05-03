<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            [
                'kode' => 'kg',
                'nama' => 'kilogram',
            ],
            [
                'kode' => 'gr',
                'nama' => 'gram',
            ],
            [
                'kode' => 'L',
                'nama' => 'liter',
            ],
        ]);
    }
}
