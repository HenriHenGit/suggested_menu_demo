<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_foods')->insert([
            [
                'id' => 'appetizer',
            ],
            [
                'id' => 'desserts',
            ],
            [
                'id' => 'main_dishes',
            ],
            [
                'id' => 'drinks',
            ],
        ]);
    }
}
