<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'name' => 'Pen Drive',
            'price' => '500',
            'category_id' => Category::first()->id,
            'sub_category_id' => SubCategory::first()->id,
            'brand_id' => Brand::first()->id,
            'unit_id' => Unit::first()->id,
        ]);
    }
}
