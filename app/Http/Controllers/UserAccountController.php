<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_detail;
use App\Models\Nutri;
use App\Models\Food;
use App\Models\Food_nutri;
use App\Models\Order_nutri;
use App\Models\Recipe_detail;
use App\Models\Ingredient;
use App\Models\Step_recipe;
use App\Models\Menu;
use Illuminate\Support\Facades\Cache;

class UserAccountController extends Controller
{

    public function index()
    {
        $userId = session('userId');
        $user = User::find($userId);
        $userDetail = User_detail::where('user_id', $userId)->get();
        $nutris = Nutri::where('id', '!=', '0')->get();


        return view('user.account.index', compact('user', 'userDetail', 'nutris'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'age' => 'nullable|integer|min:1|max:100',
            'gender' => 'nullable|in:0,1',
        ]);




        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');

        $user->save();

        $userId = $user->id;
        $userGender = $user->gender;
        $userName = $user->name;

        if ($userId) {
            $user = User::find($userId);
            $age = $user->age;
            if ($age >= 70) {
                $age = 70;
            }
            $gender = $user->gender;
            $level = $user->level;
            $orderNutris = Order_nutri::where('age', $age)
                ->where('gender', $gender)
                ->get();
            $this->updateUserDetail($orderNutris, $userId);
            $this->updateMenu($userId);
        }

        session(['userGender' => $userGender]);
        session(['userName' => $userName]);
        if ($userId) {
            $cacheKey = 'meal_' . $userId;

            // Cache::remember($cacheKey, now()->addHours(24), function () {
            //     return $this->handl();
            // });
        }

        return redirect()->route('account.index')->with('success', 'Thông tin người dùng đã được cập nhật thành công.');
    }

    private function updateMenu($userId)
    {

        $userMenu = Menu::where('user_id', $userId)->delete();
        $userMenu = Menu::where('user_id', $userId)->get();

        if ($userMenu->isEmpty()) {
            $meals = $this->handl(3, -400, 1000);
            foreach ($meals as $index => $meal) {
                if (isset($meal['meal']['main_dishes'])) {
                    $menu = new Menu();
                    $menu->user_id = $userId;
                    $menu->food_id = $meal['meal']['main_dishes']->id;
                    $menu->meal = $index;
                    $menu->save();
                }
                if (isset($meal['meal']['appetizer'])) {
                    $menu = new Menu();
                    $menu->user_id = $userId;
                    $menu->food_id = $meal['meal']['appetizer']->id;
                    $menu->meal = $index;
                    $menu->save();
                }
                if (isset($meal['meal']['desserts'])) {
                    $menu = new Menu();
                    $menu->user_id = $userId;
                    $menu->food_id = $meal['meal']['desserts']->id;
                    $menu->meal = $index;
                    $menu->save();
                }
            }
        }
    }

    private function updateUserDetail($orderNutris, $userId)
    {
        $existingData = User_detail::where('user_id', $userId)->first();

        if (isset($existingData)) {
            foreach ($orderNutris as $orderNutri) {
                User_detail::where('user_id', $userId)
                    ->where('nutri_id', $orderNutri->nutri_id)
                    ->update(['amount' => $orderNutri->amount]);
            }
        } else {
            foreach ($orderNutris as $orderNutri) {
                $newDetail = new User_detail;
                $newDetail->user_id = $userId;
                $newDetail->nutri_id = $orderNutri->nutri_id;
                $newDetail->amount = $orderNutri->amount;
                $newDetail->save();
            }
        }
    }

    private function handl($meals_per_day = 2, $toleranceMeal = 3000, $timesFind = 100)
    {

        // Nhận request id của người dùng (demo vd: 2)
        $userId = session('userId');;
        // Số lần lập tạo ra bữa ăn (Tối thiểu là 20,...)
        $timesFind = 100;
        // Tìm chính xác theo nhu cầu dinh dưỡng (Tối thiểu là 600->1000...)
        $toleranceMeal = 3000;

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
}
