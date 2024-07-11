<?php

namespace Database\Seeders;

use App\Models\Category_food;
use App\Models\Category_ingre;
use App\Models\Step_recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UsersSeeder::class,
            CategoryFoodSeeder::class,
            CategoryIngreSeeder::class,
            NutriSeeder::class,
            FoodSeeder::class,
            FoodNutriSeeder::class,
            IngredientSeeder::class,
            IngredientDetailSeeder::class,
            RecipeDetailSeeder::class,
            StepRecipeSeeder::class,
            OrderNutriSeeder::class,
        ]);
    }
}
