<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Nutri;
use App\Models\Food_nutri;
use App\Models\Order_nutri;
use App\Models\User;
use App\Models\Recipe_detail;
use App\Models\Ingredient;
use App\Models\Ingredient_detail;
use App\Models\Step_recipe;
use App\Models\User_detail;
use App\Models\Menu;
use App\Models\Meal_adjustments;

abstract class Controller
{
    protected function handl($meals_per_day = 3, $toleranceMeal = 3000, $timesFind = 100)
    {
        $mealAdjust = Meal_adjustments::findOrFail(1);

        if (count($mealAdjust) > 0) {
            $meals_per_day = $mealAdjust->meals_per_day;
            $toleranceMeal = $mealAdjust->toleranceMeal;
            $timesFind = $mealAdjust->timesFind;
        }
        // Nhận request id của người dùng (demo vd: 2)
        $userId = session('userId');

        $userDetail = User_detail::where('user_id', $userId)->get();
        $needs = $userDetail;

        // // Chia nhu cầu dinh dưỡng thành các bữa ăn (Mặc định)
        $needsPerMeal = $this->divideDailyNeeds($needs, $meals_per_day);

        // Lấy thông tin món ăn từ bảng food và phân loại (Mặc định)
        $categorizedFoods = $this->getFoods();

        // Tạo bữa ăn từ các món ăn phân loại (Mặc định)
        $meals = $this->createMeals($categorizedFoods, $needsPerMeal, $timesFind, $toleranceMeal);


        return $meals;
    }

    protected function divideDailyNeeds($needs, $meals_per_day)
    {
        $portion = 1 / $meals_per_day;
        foreach ($needs as $need) {
            $need->amount *= $portion;
        }
        return $needs;
    }

    protected function calculatorDifference($mealNutri, $needsPerMeal)
    {
        $totalFood = 0;
        foreach ($needsPerMeal as $need) {
            if (isset($mealNutri[$need->nutri_id])) {
                $totalFood += abs(round($mealNutri[$need->nutri_id]) - round($need->amount));
            }
        }
        return $totalFood;
    }

    protected function mealNutrition($listFood, $needsPerMeal)
    {
        $mealNutri = [];
        foreach ($listFood as $food) {
            $foodNutri = Food_nutri::where('food_id', $food->id)->get();
            foreach ($needsPerMeal as $need) {
                foreach ($foodNutri as $nutri) {
                    if (!isset($mealNutri[$need->nutri_id])) {
                        $mealNutri[$need->nutri_id] = 0;
                    }
                    if ($need->nutri_id == $nutri->nutri_id)
                        $mealNutri[$need->nutri_id] += round($nutri->amount) / $food->number_eat;
                }
            }
        }
        return $mealNutri;
    }


    //Lấy thông tin món ăn từ bảng food và phân loại
    protected function getFoods()
    {
        $foods = Food::select('id', 'food_name', 'desc', 'img', 'number_eat', 'category_food_id')->get();

        $categorizedFoods = [
            'main_dishes' => [],
            'drinks' => [],
            'appetizer' => [],
            'desserts' => []
        ];

        foreach ($foods as $food) {
            switch ($food->category_food_id) {
                case 'main_dishes':
                case 'drinks':
                case 'appetizer':
                case 'desserts':
                    $categorizedFoods[$food->category_food_id][] = $food;
                    break;
            }
        }

        return $categorizedFoods;
    }

    protected function createMeals($categorizedFoods, $meals_per_day, $timesFind = 100, $toleranceMeal = 600)
    {
        $meals = [];
        $categories = ['main_dishes', 'appetizer', 'desserts'];

        for ($i = 0; $i < $timesFind; $i++) {
            $meal = [];
            // $mealNutri = [];

            foreach ($categories as $category) {
                $foodsInCategory = $categorizedFoods[$category];

                if (!empty($foodsInCategory)) {
                    $food = array_shift($foodsInCategory);
                    $listFood = [$food];

                    foreach (array_diff($categories, [$category]) as $otherCategory) {
                        if (!empty($categorizedFoods[$otherCategory])) {
                            $otherFood = array_shift($categorizedFoods[$otherCategory]);
                            $listFood[] = $otherFood;
                        }
                    }

                    $totalNutriFood = $this->mealNutrition($listFood, $meals_per_day);
                    $difference = $this->calculatorDifference($totalNutriFood, $meals_per_day);

                    if ($difference <= $toleranceMeal) {
                        if (empty($meal[$listFood[0]->category_food_id]))
                            $meal[$listFood[0]->category_food_id] = $listFood[0];
                        if (isset($listFood[1]) && empty($meal[$listFood[1]->category_food_id]))
                            $meal[$listFood[1]->category_food_id] = $listFood[1];
                        if (isset($listFood[2]) && empty($meal[$listFood[2]->category_food_id]))
                            $meal[$listFood[2]->category_food_id] = $listFood[2];
                        // $mealNutri = $totalNutriFood;
                    }

                    if (!isset($meal[$category])) {
                        array_unshift($categorizedFoods[$category], $food);
                    }
                }
            }

            if (!empty($meal)) {
                $meals[] = [
                    'meal' => $meal,
                    // 'nutri' => $mealNutri
                ];
            }
        }
        return $meals;
    }

    protected function MenuInDay($userId, $sl = 3)
    {
        $mealAdjust = Meal_adjustments::findOrFail(1);

        if (count($mealAdjust) > 0) {
            $sl = $mealAdjust->meals_per_day;
        }

        $meals = [];
        $mealNutri = [];

        $menus = Menu::where('user_id', $userId)->get();
        $foods = Food::all();

        foreach ($menus as $menu) {
            foreach ($foods as $food) {
                if ($food->id == $menu->food_id) {
                    // Thêm món ăn vào meals
                    $meals[$menu->meal][] = $food;

                    // Tính toán giá trị dinh dưỡng của bữa ăn
                    $foodNutri = Food_nutri::where('food_id', $food->id)->get();
                    foreach ($foodNutri as $nutri) {
                        if (!isset($mealNutri[$menu->meal][$nutri->nutri_id])) {
                            $mealNutri[$menu->meal][$nutri->nutri_id] = 0;
                        }
                        $mealNutri[$menu->meal][$nutri->nutri_id] += round($nutri->amount) / $food->number_eat;
                    }
                    break;
                }
            }
        }

        // Tách meals thành các phần nhỏ hơn
        $splitMeals = array_chunk($meals, $sl, true);
        $combinedMeals = [];

        // Lấy dữ liệu từ bảng User_detail
        $userDetails = User_detail::where('user_id', $userId)->get();
        $userNutriAmounts = [];
        foreach ($userDetails as $detail) {
            $userNutriAmounts[$detail->nutri_id] = $detail->amount;
        }

        foreach ($splitMeals as $mealChunk) {
            $combinedMeal = [
                'meal' => [],
                'nutris' => [],
                'diff' => []
            ];
            foreach ($mealChunk as $mealIndex => $meal) {
                // Tổng hợp bữa ăn từ các bữa ăn lại thành 1 bữa/ngày
                $combinedMeal['meal'] = array_merge($combinedMeal['meal'], $meal);

                // Tính toán các chất dinh dưỡng 1 bữa/ngày
                if (isset($mealNutri[$mealIndex])) {
                    foreach ($mealNutri[$mealIndex] as $nutriId => $nutriAmount) {
                        if (!isset($combinedMeal['nutris'][$nutriId])) {
                            $combinedMeal['nutris'][$nutriId] = 0;
                        }
                        $combinedMeal['nutris'][$nutriId] += round($nutriAmount, 2);

                        // Tính toán chênh lệch phần trăm
                        $userAmount = isset($userNutriAmounts[$nutriId]) ? $userNutriAmounts[$nutriId] : 0;
                        if ($userAmount > 0) {
                            $percentDiff = (($combinedMeal['nutris'][$nutriId] - $userAmount) / $userAmount) * 100;
                        } else {
                            $percentDiff = 0;
                        }
                        $combinedMeal['diff'][$nutriId] = round($percentDiff, 2);
                    }
                }
            }

            $combinedMeals[] = $combinedMeal;
        }

        return $combinedMeals;
    }

    protected function insertFoodNutri($foodId)
    {
        Food_nutri::withTrashed()->where('food_id', $foodId)->forceDelete();

        $nutritionValues = [];

        if ($foodId) {
            $recipeDetails = Recipe_detail::where('food_id', $foodId)->get();
            if ($recipeDetails->isNotEmpty()) {
                foreach ($recipeDetails as $recipeDetail) {
                    $ingredientDetails = Ingredient_detail::where('ingredient_id', $recipeDetail->ingredient_id)->get();
                    foreach ($ingredientDetails as $ingredientDetail) {
                        $nutritionalAmount = $ingredientDetail->amount * ($recipeDetail->amount / 100);
                        if (!isset($nutritionValues[$ingredientDetail->nutri_id])) {
                            $nutritionValues[$ingredientDetail->nutri_id] = 0;
                        }
                        $nutritionValues[$ingredientDetail->nutri_id] += $nutritionalAmount;
                    }
                }
            }
        }

        foreach ($nutritionValues as $nutriId => $amount) {
            $foodNutri = new Food_nutri();
            $foodNutri->food_id = $foodId;
            $foodNutri->nutri_id = $nutriId;
            $foodNutri->amount = $amount;
            $foodNutri->save();
        }
    }
}
