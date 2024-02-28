<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 6000000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 2, 'harga' => 3500000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 3, 'harga' => 250000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 4, 'harga' => 350000, 'jumlah' => 2],
            ['penjualan_id' => 2, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 3],
            ['penjualan_id' => 2, 'barang_id' => 6, 'harga' => 25000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 7, 'harga' => 175000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 8, 'harga' => 300000, 'jumlah' => 2],
            ['penjualan_id' => 3, 'barang_id' => 9, 'harga' => 450000, 'jumlah' => 1],
            ['penjualan_id' => 4, 'barang_id' => 10, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 4, 'barang_id' => 1, 'harga' => 6000000, 'jumlah' => 2],
            ['penjualan_id' => 4, 'barang_id' => 2, 'harga' => 3500000, 'jumlah' => 1],
            ['penjualan_id' => 5, 'barang_id' => 3, 'harga' => 250000, 'jumlah' => 1],
            ['penjualan_id' => 5, 'barang_id' => 4, 'harga' => 350000, 'jumlah' => 1],
            ['penjualan_id' => 5, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 1],
            ['penjualan_id' => 6, 'barang_id' => 6, 'harga' => 25000, 'jumlah' => 1],
            ['penjualan_id' => 6, 'barang_id' => 7, 'harga' => 175000, 'jumlah' => 2],
            ['penjualan_id' => 6, 'barang_id' => 8, 'harga' => 300000, 'jumlah' => 1],
            ['penjualan_id' => 7, 'barang_id' => 9, 'harga' => 450000, 'jumlah' => 1],
            ['penjualan_id' => 7, 'barang_id' => 10, 'harga' => 55000, 'jumlah' => 1],
            ['penjualan_id' => 7, 'barang_id' => 1, 'harga' => 6000000, 'jumlah' => 1],
            ['penjualan_id' => 8, 'barang_id' => 2, 'harga' => 3500000, 'jumlah' => 2],
            ['penjualan_id' => 8, 'barang_id' => 3, 'harga' => 250000, 'jumlah' => 1],
            ['penjualan_id' => 8, 'barang_id' => 4, 'harga' => 350000, 'jumlah' => 1],
            ['penjualan_id' => 9, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 2],
            ['penjualan_id' => 9, 'barang_id' => 6, 'harga' => 25000, 'jumlah' => 1],
            ['penjualan_id' => 9, 'barang_id' => 7, 'harga' => 175000, 'jumlah' => 1],
            ['penjualan_id' => 10, 'barang_id' => 8, 'harga' => 300000, 'jumlah' => 2],
            ['penjualan_id' => 10, 'barang_id' => 9, 'harga' => 450000, 'jumlah' => 1],
            ['penjualan_id' => 10, 'barang_id' => 10, 'harga' => 55000, 'jumlah' => 1],
        ];

        DB::table('t_penjualan_detail')->insert($data);

    }
}
