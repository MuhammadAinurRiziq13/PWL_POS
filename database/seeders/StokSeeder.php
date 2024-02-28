<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 08:00:00', 'stok_jumlah' => 100],
            ['barang_id' => 2, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 09:00:00', 'stok_jumlah' => 200],
            ['barang_id' => 3, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 10:00:00', 'stok_jumlah' => 50],
            ['barang_id' => 4, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 11:00:00', 'stok_jumlah' => 75],
            ['barang_id' => 5, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 12:00:00', 'stok_jumlah' => 150],
            ['barang_id' => 6, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 13:00:00', 'stok_jumlah' => 80],
            ['barang_id' => 7, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 14:00:00', 'stok_jumlah' => 90],
            ['barang_id' => 8, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 15:00:00', 'stok_jumlah' => 110],
            ['barang_id' => 9, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 16:00:00', 'stok_jumlah' => 30],
            ['barang_id' => 10, 'user_id' => 1, 'stok_tanggal' => '2024-01-01 17:00:00', 'stok_jumlah' => 45],
        ];

        DB::table('t_stok')->insert($data);
        
    }
}
