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
        Category::create([
            'title' => 'camera',
            'description' => 'lorem ipsum',
        ]);
        Category::create([
            'title' => 'car',
            'description' => 'lorem ipsum2',
        ]);
    }
}
