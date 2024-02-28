<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 'KAT001', 'kategori_nama' => 'Elektronik'],
            ['kategori_kode' => 'KAT002', 'kategori_nama' => 'Pakaian'],
            ['kategori_kode' => 'KAT003', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'KAT004', 'kategori_nama' => 'Buku'],
            ['kategori_kode' => 'KAT005', 'kategori_nama' => 'Otomotif'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
