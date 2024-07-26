<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Kategori Politik']);
        Category::create(['name' => 'Kategori Ekonomi']);
        Category::create(['name' => 'Kategori Teknologi']);
        Category::create(['name' => 'Kategori Olahraga']);
        Category::create(['name' => 'Kategori Hiburan']);
        Category::create(['name' => 'Kategori Kesehatan']);
        Category::create(['name' => 'Kategori Pendidikan']);
    }
}
