<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Fakhar Reza',
                'penjualan_kode' => 'PNJ001',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Kaka Fahreza',
                'penjualan_kode' => 'PNJ002',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Marcel Darma',
                'penjualan_kode' => 'PNJ003',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Alfito Dianova',
                'penjualan_kode' => 'PNJ004',
                'penjualan_tanggal' => NOW(),
            ],    
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Naufal Putra',
                'penjualan_kode' => 'PNJ005',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Iyazuz Zidan',
                'penjualan_kode' => 'PNJ006',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Michelle Alexandra',
                'penjualan_kode' => 'PNJ007',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Shani Indira',
                'penjualan_kode' => 'PNJ008',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Anthony El Gasing',
                'penjualan_kode' => 'PNJ009',
                'penjualan_tanggal' => NOW(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Mudryk El Dear God',
                'penjualan_kode' => 'PNJ010',
                'penjualan_tanggal' => NOW(),
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
