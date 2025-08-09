<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Product::create([
        'name' => 'Dosa Masala',
        'price' => 79.00,
        'description' => 'Delicious dosa masala',
        'stock_quantity' => 50,
    ]);
}
}
