<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function __construct(Food $foods, Food_nutri $foodNutris, Order_nutri $orderNutris, User $user, Nutri $nutris, Recipe_detail $recipeDetails, Ingredient $ingredients, Step_recipe $stepRecipes, User_detail $userDetail)
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
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Nhận request id của người dùng (demo vd: 2)
        $userId = session('userId');;
        // Số lần lập tạo ra bữa ăn (Tối thiểu là 20,...)
        $timesFind = 30;
        // Tìm chính xác theo nhu cầu dinh dưỡng (Tối thiểu là 600->1000...)
        $toleranceMeal = 7000;

        // Số lần bữa ăn trong 1 ngày (Có thể sửa)
        if (!empty($request['meals_per_day']))
            $meals_per_day = $request['meals_per_day'];
        else
            $meals_per_day = 2; // (Có thể sửa)

        if ($meals_per_day == 1)
            $toleranceMeal = 7000;
        if ($meals_per_day == 2)
            $toleranceMeal = 3000;
        if ($meals_per_day == 3)
            $toleranceMeal = 2000;
        if ($meals_per_day == 4)
            $toleranceMeal = 2000;


        $userDetail = $this->userDetail->where('user_id', $userId)->get();
        $needs = $userDetail;

        // // Chia nhu cầu dinh dưỡng thành các bữa ăn (Mặc định)
        $needsPerMeal = $this->divideDailyNeeds($needs, $meals_per_day);

        // Lấy thông tin món ăn từ bảng food và phân loại (Mặc định)
        $categorizedFoods = $this->getFoods();

        // Tạo bữa ăn từ các món ăn phân loại (Mặc định)
        $meals = $this->createMeals($categorizedFoods, $needsPerMeal, $timesFind, $toleranceMeal);
        // Thêm vào bảng oder_nutri (Mặc định)
        $needsUser = $this->initialDailyNeeds($needs, $meals_per_day);

        // $foods = $this->foods->paginate(12);
        $nutris = $this->nutris->all();
        $nutriIds = ['MACR001', 'MACR002', 'MACR004'];
        $foodNutris = $this->foodNutris->whereIn('nutri_id', $nutriIds)->get();
        $user = $this->user->find($userId);
        $age = $user->age;
        $gender = $user->gender;
        $level = $user->level;

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
        dd($request);
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
        $validatedData = $request->validate([
            'nutri_needs' => 'required|array',
            'nutri_needs.*.amount' => 'required|numeric|min:0',
            'nutri_needs.*.user_id' => 'required|integer|exists:users,id',
            'meals_per_day' => 'required|integer|between:1,4'
        ]);

        foreach ($request->input('nutri_needs') as $key => $need) {
            $userDetail = User_detail::where('user_id', $need['user_id'])
                ->where('nutri_id', $key)->first();
            if ($userDetail) {
                $userDetail->amount = $need['amount'];
                $userDetail->save();
            }
        }
        $meals_per_day = $request->input('meals_per_day');

        return redirect()->route('menus.index', compact('meals_per_day'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }

    // Chia nhu cầu dinh dưỡng thành các bữa ăn
    private function divideDailyNeeds($needs, $meals_per_day)
    {
        $portion = 1 / $meals_per_day;
        foreach ($needs as $need) {
            $need->amount *= $portion;
        }
        return $needs;
    }


    // Nhu cầu dinh dưỡng người dùng
    private function initialDailyNeeds($needs, $meals_per_day)
    {
        $portion = 1 * $meals_per_day;
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
