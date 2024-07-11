<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Menu;
use App\Models\Food;
use App\Models\Nutri;
use App\Models\Food_nutri;
use App\Models\Order_nutri;
use App\Models\User;
use App\Models\Recipe_detail;
use App\Models\Ingredient;
use App\Models\Step_recipe;
use App\Models\User_detail;

class UserMenuController extends Controller
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
    private $meals;

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
        // $userId = session('userId');
        // $this->meals = Cache::get('meal_' . $userId);
        // $this->meals = $this->handl();
        // dd($userId);

    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $userId = session('userId');

        $needsUser = $this->userDetail->where('user_id', $userId)->get();
        $meals = $this->meals;

        // $foods = $this->foods->paginate(12);
        $nutris = $this->nutris->all();
        // $nutriIds = ['MACR001', 'MACR002', 'MACR004'];
        $nutriIds = ['MACR001', 'MACR002', 'MACR004'];
        $foodNutris = $this->foodNutris->whereIn('nutri_id', $nutriIds)->get();



        return view('user.menus.index', compact('foodNutris', 'needsUser', 'nutris', 'meals'));
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
    public function store(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // Cập nhật nhu cầu dinh dưỡng người dùng
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function demoIndex()
    {
        $userId = session('userId');
        $meals = $this->MenuInDay($userId);

        $userDetail = $this->userDetail->where('user_id', $userId)->get();
        $nutris = $this->nutris->where('id', '!=', '0')->get();

        // dd($meals);

        return view('user.menus.demoIndex', compact('meals', 'userDetail', 'nutris'));
    }

    private function MenuInDay($userId, $sl = 3)
    {
        $meals = [];
        $mealNutri = [];

        $menus = $this->menus->where('user_id', $userId)->get();
        $foods = $this->foods->all();

        foreach ($menus as $menu) {
            foreach ($foods as $food) {
                if ($food->id == $menu->food_id) {
                    // Thêm món ăn vào meals
                    $meals[$menu->meal][] = $food;

                    // Tính toán giá trị dinh dưỡng của bữa ăn
                    $foodNutri = $this->foodNutris->where('food_id', $food->id)->get();
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
        $userDetails = $this->userDetail->where('user_id', $userId)->get();
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

        // dd($combinedMeals);

        return $combinedMeals;
    }











    private function handl()
    {

        $userId = session('userId');;
        // Số lần lập tạo ra bữa ăn (Tối thiểu là 20,...)
        $timesFind = 100;
        // Tìm chính xác theo nhu cầu dinh dưỡng (Tối thiểu là 600->1000...)
        $toleranceMeal = 900;

        // Số lần bữa ăn trong 1 ngày (Có thể sửa)
        $meals_per_day = 2; // (Có thể sửa)

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

    private function divideDailyNeeds($needs, $meals_per_day)
    {
        $portion = 1 / $meals_per_day;
        foreach ($needs as $need) {
            $need->amount *= $portion;
        }
        return $needs;
    }

    private function calculatorDifference($mealNutri, $needsPerMeal)
    {
        $totalFood = 0;
        foreach ($needsPerMeal as $need) {
            if (isset($mealNutri[$need->nutri_id])) {
                $totalFood += abs(round($mealNutri[$need->nutri_id]) - round($need->amount));
            }
        }
        return $totalFood;
    }

    private function mealNutrition($listFood, $needsPerMeal)
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
    private function getFoods()
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

    private function createMeals($categorizedFoods, $meals_per_day, $timesFind = 100, $toleranceMeal = 600)
    {
        $meals = [];
        $categories = ['main_dishes', 'appetizer', 'desserts'];

        for ($i = 0; $i < $timesFind; $i++) {
            $meal = [];
            $mealNutri = [];

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
                        $mealNutri = $totalNutriFood;
                    }

                    if (!isset($meal[$category])) {
                        array_unshift($categorizedFoods[$category], $food);
                    }
                }
            }

            if (!empty($meal)) {
                $meals[] = [
                    'meal' => $meal,
                    'nutri' => $mealNutri
                ];
            }
        }
        return $meals;
    }
}
