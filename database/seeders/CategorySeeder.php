<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Groceries',
            'Restaurants',
            'Transportation',
            'Entertainment',
            'Shopping',
            'Bills',
            'Healthcare',
            'Travel',
            'Income',
            'Transfer'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
