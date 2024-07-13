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
            $orderNutris = Order_nutri::where('age', $age)
                ->where('gender', $gender)
                ->get();
            $this->insertUserDetail($orderNutris, $userId);
            $this->insertMenu($userId);
            $userDetail = $this->userDetail->where('user_id', $userId)->get();
        } else {
            $userDetail = $this->userDetail->first();
        }

        return view('user.foods.index', compact('foods', 'foodNutris', 'userDetail', 'nutris'));
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

    private function insertMenu($userId)
    {

        // $userMenu = Menu::where('user_id', $userId)->delete();
        $userMenu = Menu::where('user_id', $userId)->get();
        if ($userMenu->isEmpty()) {
            $meals = $this->handl();
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
}
