<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
        // Elektronik
        [
            'barang_id' => 1,
            'kategori_id' => 1,
            'barang_kode' => 'BRG001',
            'barang_nama' => 'Laptop',
            'harga_beli' => 5000000,
            'harga_jual' => 7000000,
        ],
        [
            'barang_id' => 2,
            'kategori_id' => 1,
            'barang_kode' => 'BRG002',
            'barang_nama' => 'Handphone',
            'harga_beli' => 3000000,
            'harga_jual' => 4500000,
        ],
        [
            'barang_id' => 3,
            'kategori_id' => 1,
            'barang_kode' => 'BRG003',
            'barang_nama' => 'Tablet',
            'harga_beli' => 2000000,
            'harga_jual' => 3000000,
        ],
        [
            'barang_id' => 4,
            'kategori_id' => 1,
            'barang_kode' => 'BRG004',
            'barang_nama' => 'Smartwatch',
            'harga_beli' => 1000000,
            'harga_jual' => 1500000,
        ],
        [
            'barang_id' => 5,
            'kategori_id' => 1,
            'barang_kode' => 'BRG005',
            'barang_nama' => 'Kamera',
            'harga_beli' => 4000000,
            'harga_jual' => 5500000,
        ],

        // Furnitur
        [
            'barang_id' => 6,
            'kategori_id' => 2,
            'barang_kode' => 'BRG006',
            'barang_nama' => 'Kursi',
            'harga_beli' => 200000,
            'harga_jual' => 300000,
        ],
        [
            'barang_id' => 7,
            'kategori_id' => 2,
            'barang_kode' => 'BRG007',
            'barang_nama' => 'Meja',
            'harga_beli' => 500000,
            'harga_jual' => 700000,
        ],
        [
            'barang_id' => 8,
            'kategori_id' => 2,
            'barang_kode' => 'BRG008',
            'barang_nama' => 'Sofa',
            'harga_beli' => 1000000,
            'harga_jual' => 1500000,
        ],
        [
            'barang_id' => 9,
            'kategori_id' => 2,
            'barang_kode' => 'BRG009',
            'barang_nama' => 'Kasur',
            'harga_beli' => 2000000,
            'harga_jual' => 2500000,
        ],
        [
            'barang_id' => 10,
            'kategori_id' => 2,
            'barang_kode' => 'BRG010',
            'barang_nama' => 'Lemari',
            'harga_beli' => 1500000,
            'harga_jual' => 2000000,
        ],

        // ATK
        [
            'barang_id' => 11,
            'kategori_id' => 3,
            'barang_kode' => 'BRG011',
            'barang_nama' => 'Pulpen',
            'harga_beli' => 500,
            'harga_jual' => 1000,
        ],
        [
            'barang_id' => 12,
            'kategori_id' => 3,
            'barang_kode' => 'BRG012',
            'barang_nama' => 'Buku',
            'harga_beli' => 5000,
            'harga_jual' => 10000,
        ],
        [
            'barang_id' => 13,
            'kategori_id' => 3,
            'barang_kode' => 'BRG013',
            'barang_nama' => 'Spidol',
            'harga_beli' => 3000,
            'harga_jual' => 6000,
        ],
        [
            'barang_id' => 14,
            'kategori_id' => 3,
            'barang_kode' => 'BRG014',
            'barang_nama' => 'Stapler',
            'harga_beli' => 10000,
            'harga_jual' => 15000,
        ],
        [
            'barang_id' => 15,
            'kategori_id' => 3,
            'barang_kode' => 'BRG015',
            'barang_nama' => 'Solasi',
            'harga_beli' => 2000,
            'harga_jual' => 4000,
        ],

        // Pakaian
        [
            'barang_id' => 16,
            'kategori_id' => 4,
            'barang_kode' => 'BRG016',
            'barang_nama' => 'Kaos',
            'harga_beli' => 30000,
            'harga_jual' => 50000,
        ],
        [
            'barang_id' => 17,
            'kategori_id' => 4,
            'barang_kode' => 'BRG017',
            'barang_nama' => 'Jeans',
            'harga_beli' => 100000,
            'harga_jual' => 150000,
        ],
        [
            'barang_id' => 18,
            'kategori_id' => 4,
            'barang_kode' => 'BRG018',
            'barang_nama' => 'Jaket',
            'harga_beli' => 150000,
            'harga_jual' => 200000,
        ],
        [
            'barang_id' => 19,
            'kategori_id' => 4,
            'barang_kode' => 'BRG019',
            'barang_nama' => 'Sepatu',
            'harga_beli' => 200000,
            'harga_jual' => 250000,
        ],
        [
            'barang_id' => 20,
            'kategori_id' => 4,
            'barang_kode' => 'BRG020',
            'barang_nama' => 'Topi',
            'harga_beli' => 50000,
            'harga_jual' => 80000,
        ],

        // Boneka
        [
            'barang_id' => 21,
            'kategori_id' => 5,
            'barang_kode' => 'BNK001',
            'barang_nama' => 'Boneka Teddy Bear',
            'harga_beli' => 75000,
            'harga_jual' => 100000,
        ],
        [
            'barang_id' => 22, 
            'kategori_id' => 5,
            'barang_kode' => 'BNK002',
            'barang_nama' => 'Boneka Barbie',
            'harga_beli' => 90000,
            'harga_jual' => 130000,
        ],
        [
            'barang_id' => 23,
            'kategori_id' => 5,
            'barang_kode' => 'BNK003',
            'barang_nama' => 'Boneka Doraemon',
            'harga_beli' => 80000,
            'harga_jual' => 110000,
        ],
        [
            'barang_id' => 24,
            'kategori_id' => 5,
            'barang_kode' => 'BNK004',
            'barang_nama' => 'Boneka Hello Kitty',
            'harga_beli' => 85000,
            'harga_jual' => 120000,
        ],
        [
            'barang_id' => 25,
            'kategori_id' => 5,
            'barang_kode' => 'BNK005',
            'barang_nama' => 'Boneka Unicorn',
            'harga_beli' => 100000,
            'harga_jual' => 150000,
        ],
       ];
       DB::table('m_barang')->insert($data);
    }
}
