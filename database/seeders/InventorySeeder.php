<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Kategori terlebih dahulu
        // Tambahkan description di sini
        $cat1 = Category::create(['name' => 'Elektronik', 'description' => 'Barang-barang elektronik kantor']);
        $cat2 = Category::create(['name' => 'Furniture', 'description' => 'Meja, kursi, dan lemari']);
        $cat3 = Category::create(['name' => 'Alat Kantor', 'description' => 'Alat tulis dan perlengkapan kerja']);

        // 2. Buat Data Inventaris/Barang
        Inventory::create([
            'name' => 'Laptop MacBook Pro',
            'description' => 'M3 Chip, 16GB RAM, 512GB SSD. Barang inventaris kantor pusat.',
            'stock' => 5,
            'category_id' => $cat1->id,
        ]);

        Inventory::create([
            'name' => 'Kursi Kerja Ergonomis',
            'description' => 'Kursi kantor dengan dukungan tulang belakang. Warna Hitam.',
            'stock' => 12,
            'category_id' => $cat2->id,
        ]);

        Inventory::create([
            'name' => 'Proyektor Epson',
            'description' => 'Proyektor untuk ruang meeting utama. Resolusi Full HD.',
            'stock' => 3,
            'category_id' => $cat1->id,
        ]);

        Inventory::create([
            'name' => 'Meja Rapat Kayu Jati',
            'description' => 'Meja panjang kapasitas 10 orang.',
            'stock' => 2,
            'category_id' => $cat2->id,
        ]);
    }
}