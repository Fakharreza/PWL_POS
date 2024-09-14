<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_kode' => 'SUP001',
                'supplier_nama' => 'Afun',
                'supplier_alamat' => 'Sawojajar',
            ],
            [
                'supplier_kode' => 'SUP002',
                'supplier_nama' => 'Indomerit',
                'supplier_alamat' => 'Dinoyo',
            ],
            [
                'supplier_kode' => 'SUP003',
                'supplier_nama' => 'Harsono',
                'supplier_alamat' => 'Blimbing',
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
