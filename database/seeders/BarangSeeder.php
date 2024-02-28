<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Laptop ASUS', 'harga_beli' => 5000000, 'harga_jual' => 6000000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Smartphone Samsung', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG003', 'barang_nama' => 'Kemeja Putih', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 300000, 'harga_jual' => 350000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG005', 'barang_nama' => 'Nasi Goreng', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Sate Ayam', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG007', 'barang_nama' => 'Novel Harry Potter', 'harga_beli' => 150000, 'harga_jual' => 175000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Buku Atlas Dunia', 'harga_beli' => 250000, 'harga_jual' => 300000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG009', 'barang_nama' => 'Ban Mobil', 'harga_beli' => 400000, 'harga_jual' => 450000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Oli SAE 10W-40', 'harga_beli' => 50000, 'harga_jual' => 55000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
