<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

use App\Models\Food;
use App\Models\Nutri;
use App\Models\Food_nutri;
use App\Models\Order_nutri;
use App\Models\User;
use App\Models\Recipe_detail;
use App\Models\Ingredient;
use App\Models\Step_recipe;
use App\Models\User_detail;
use App\Models\Menu;

class UserFoodController extends Controller
{
    private $foods;
    private $foodNutris;
    private $orderNutris;
    private $user;
    private $nutris;
    private $recipeDetails;
    private $ingredients;
    private $stepRecipes;
    private $userDetail;
    private $menus;

    public function __construct(Food $foods, Food_nutri $foodNutris, Order_nutri $orderNutris, User $user, Nutri $nutris, Recipe_detail $recipeDetails, Ingredient $ingredients, Step_recipe $stepRecipes, User_detail $userDetail, Menu $menus)
    {
        $this->foods = $foods;
        $this->foodNutris = $foodNutris;
        $this->orderNutris = $orderNutris;
        $this->user = $user;
        $this->nutris = $nutris;
        $this->recipeDetails = $recipeDetails;
        $this->ingredients = $ingredients;
        $this->stepRecipes = $stepRecipes;
        $this->userDetail = $userDetail;
        $this->menus = $menus;

        $userId = session('userId');

        $user = User::find($userId);
        $userGender = $user->gender;
        $userName = $user->name;
        session(['userGender' => $userGender, 'userName' => $userName]);

        // if ($userId) {
        //     $cacheKey = 'meal_' . $userId;


        //     Cache::forget($cacheKey);

        //     Cache::remember($cacheKey, now()->addHours(24), function () {
        //         Log::info('Executing handle function');
        //         $meals = $this->handl();
        //         Log::info('Meals:', $meals);
        //         return $meals;
        //     });
        // }
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = $this->foods->paginate(12);
        $nutris = $this->nutris->all();
        $nutriIds = ['MACR001', 'MACR002', 'MACR004'];
        $foodNutris = $this->foodNutris->whereIn('nutri_id', $nutriIds)->get();
        $userId = session('userId');
        if ($userId) {
            $user = $this->user->find($userId);
            $age = $user->age;
            if ($age >= 70) {
                $age = 70;
            }
            $gender = $user->gender;
            $level = $user->level;
            $orderNutris = $this->orderNutris->where('age', $age)
                ->where('gender', $gender)
                ->get();
            $this->insertUserDetail($orderNutris, $userId);
            $userDetail = $this->userDetail->where('user_id', $userId)->get();
        } else {
            $userDetail = $this->userDetail->first();
        }

        return view('user.foods.index', compact('foods', 'foodNutris', 'userDetail', 'nutris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Request $request)
    {
        // Lấy ra 1 món ăn
        $food = Food::findOrFail($id);

        $foodNutris = $this->foodNutris->where('food_id', $id)
            ->where('nutri_id', '!=', '0')
            ->get();

        $nutris = $this->nutris->where('id', '!=', '0')->get();
        $recipeDetails = $this->recipeDetails->where('food_id', $id)->get();
        $ingredientIds = $recipeDetails->pluck('ingredient_id')->toArray();
        $ingredients = $this->ingredients->whereIn('id', $ingredientIds)->get();
        $stepRecipes = $this->stepRecipes->where('food_id', $id)->get();
        return view('user.foods.show', compact('food', 'foodNutris', 'nutris', 'recipeDetails', 'ingredients', 'stepRecipes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
    }

    private function insertUserDetail($orderNutris, $userId)
    {
        foreach ($orderNutris as $orderNutri) {

            $existingRecord = User_detail::where('user_id', $userId)
                ->where('nutri_id', $orderNutri->nutri_id)
                ->first();

            if ($existingRecord) {

                $existingRecord->amount = $orderNutri->amount;
                $existingRecord->updated_at = now();
                $existingRecord->save();
            } else {

                $newRecord = new User_detail;
                $newRecord->user_id = $userId;
                $newRecord->nutri_id = $orderNutri->nutri_id;
                $newRecord->amount = $orderNutri->amount;
                $newRecord->created_at = now();
                $newRecord->updated_at = now();
                $newRecord->save();
            }
        }
    }

    // private function handl()
    // {

    //     // Nhận request id của người dùng (demo vd: 2)
    //     $userId = session('userId');;
    //     // Số lần lập tạo ra bữa ăn (Tối thiểu là 20,...)
    //     $timesFind = 100;
    //     // Tìm chính xác theo nhu cầu dinh dưỡng (Tối thiểu là 600->1000...)
    //     $toleranceMeal = 900;

    //     // Số lần bữa ăn trong 1 ngày (Có thể sửa)
    //     $meals_per_day = 2; // (Có thể sửa)

    //     $userDetail = $this->userDetail->where('user_id', $userId)->get();
    //     $needs = $userDetail;
    //     // // Chia nhu cầu dinh dưỡng thành các bữa ăn (Mặc định)
    //     $needsPerMeal = $this->divideDailyNeeds($needs, $meals_per_day);
    //     // Lấy thông tin món ăn từ bảng food và phân loại (Mặc định)
    //     $categorizedFoods = $this->getFoods();

    //     // Tạo bữa ăn từ các món ăn phân loại (Mặc định)
    //     $meals = $this->createMeals($categorizedFoods, $needsPerMeal, $timesFind, $toleranceMeal);

    //     return $meals;
    // }

    // private function divideDailyNeeds($needs, $meals_per_day)
    // {
    //     $portion = 1 / $meals_per_day;
    //     foreach ($needs as $need) {
    //         $need->amount *= $portion;
    //     }
    //     return $needs;
    // }

    // private function calculatorDifference($mealNutri, $needsPerMeal)
    // {
    //     $totalFood = 0;
    //     foreach ($needsPerMeal as $need) {
    //         if (isset($mealNutri[$need->nutri_id])) {
    //             $totalFood += abs(round($mealNutri[$need->nutri_id]) - round($need->amount));
    //         }
    //     }
    //     return $totalFood;
    // }

    // private function mealNutrition($listFood, $needsPerMeal)
    // {
    //     $mealNutri = [];
    //     foreach ($listFood as $food) {
    //         $foodNutri = Food_nutri::where('food_id', $food->id)->get();
    //         foreach ($needsPerMeal as $need) {
    //             foreach ($foodNutri as $nutri) {
    //                 if (!isset($mealNutri[$need->nutri_id])) {
    //                     $mealNutri[$need->nutri_id] = 0;
    //                 }
    //                 if ($need->nutri_id == $nutri->nutri_id)
    //                     $mealNutri[$need->nutri_id] += round($nutri->amount) / $food->number_eat;
    //             }
    //         }
    //     }
    //     return $mealNutri;
    // }


    // //Lấy thông tin món ăn từ bảng food và phân loại
    // private function getFoods()
    // {
    //     $foods = Food::select('id', 'food_name', 'desc', 'img', 'number_eat', 'category_food_id')->get();

    //     $categorizedFoods = [
    //         'main_dishes' => [],
    //         'drinks' => [],
    //         'appetizer' => [],
    //         'desserts' => []
    //     ];

    //     foreach ($foods as $food) {
    //         switch ($food->category_food_id) {
    //             case 'main_dishes':
    //             case 'drinks':
    //             case 'appetizer':
    //             case 'desserts':
    //                 $categorizedFoods[$food->category_food_id][] = $food;
    //                 break;
    //         }
    //     }

    //     return $categorizedFoods;
    // }

    // private function createMeals($categorizedFoods, $meals_per_day, $timesFind = 100, $toleranceMeal = 600)
    // {
    //     $meals = [];
    //     $categories = ['main_dishes', 'appetizer', 'desserts'];

    //     for ($i = 0; $i < $timesFind; $i++) {
    //         $meal = [];
    //         $mealNutri = [];

    //         foreach ($categories as $category) {
    //             $foodsInCategory = $categorizedFoods[$category];

    //             if (!empty($foodsInCategory)) {
    //                 $food = array_shift($foodsInCategory);
    //                 $listFood = [$food];

    //                 foreach (array_diff($categories, [$category]) as $otherCategory) {
    //                     if (!empty($categorizedFoods[$otherCategory])) {
    //                         $otherFood = array_shift($categorizedFoods[$otherCategory]);
    //                         $listFood[] = $otherFood;
    //                     }
    //                 }

    //                 $totalNutriFood = $this->mealNutrition($listFood, $meals_per_day);
    //                 $difference = $this->calculatorDifference($totalNutriFood, $meals_per_day);
    //                 if ($difference <= $toleranceMeal) {
    //                     if (empty($meal[$listFood[0]->category_food_id]))
    //                         $meal[$listFood[0]->category_food_id] = $listFood[0];
    //                     if (isset($listFood[1]) && empty($meal[$listFood[1]->category_food_id]))
    //                         $meal[$listFood[1]->category_food_id] = $listFood[1];
    //                     if (isset($listFood[2]) && empty($meal[$listFood[2]->category_food_id]))
    //                         $meal[$listFood[2]->category_food_id] = $listFood[2];
    //                     $mealNutri = $totalNutriFood;
    //                 }

    //                 if (!isset($meal[$category])) {
    //                     array_unshift($categorizedFoods[$category], $food);
    //                 }
    //             }
    //         }

    //         if (!empty($meal)) {
    //             $meals[] = [
    //                 'meal' => $meal,
    //                 'nutri' => $mealNutri
    //             ];
    //         }
    //     }
    //     return $meals;
    // }
}
