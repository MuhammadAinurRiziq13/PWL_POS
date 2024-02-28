<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 1, 'penjualan_kode' => 'PJ001', 'pembeli' => 'Budi', 'penjualan_tanggal' => '2024-01-01 08:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ002', 'pembeli' => 'Susi', 'penjualan_tanggal' => '2024-01-01 09:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ003', 'pembeli' => 'Andi', 'penjualan_tanggal' => '2024-01-01 10:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ004', 'pembeli' => 'Rina', 'penjualan_tanggal' => '2024-01-01 11:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ005', 'pembeli' => 'Eka', 'penjualan_tanggal' => '2024-01-01 12:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ006', 'pembeli' => 'Joko', 'penjualan_tanggal' => '2024-01-01 13:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ007', 'pembeli' => 'Dini', 'penjualan_tanggal' => '2024-01-01 14:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ008', 'pembeli' => 'Putri', 'penjualan_tanggal' => '2024-01-01 15:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ009', 'pembeli' => 'Joni', 'penjualan_tanggal' => '2024-01-01 16:00:00'],
            ['user_id' => 1, 'penjualan_kode' => 'PJ010', 'pembeli' => 'Dewi', 'penjualan_tanggal' => '2024-01-01 17:00:00'],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
