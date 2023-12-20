<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$role = Role::create(['name' => 'admin']);
        $product=Product::create([
			'id' => '1',
            'name' => 'Laptop',
            'description' => 'Very useful',
            'image'=>'laptop.jpg',
            // 'category_id'=>1,
            'quantity'=>20,
        ]);
    }
}
