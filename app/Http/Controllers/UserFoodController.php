<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Nutri;
use App\Models\Food_nutri;
use App\Models\Order_nutri;
use App\Models\User;
use App\Models\Recipe_detail;
use App\Models\Ingredient;
use App\Models\Step_recipe;
use App\Models\User_detail;

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
    private function insertUserDetail($orderNutris, $userId)
    {
        $data = User_detail::where('user_id', $userId)->first();
        if (!isset($data)) {
            foreach ($orderNutris as $orderNutri) {
                $order_nutri = new User_detail;
                $order_nutri->user_id = $userId;
                $order_nutri->nutri_id = $orderNutri->nutri_id;
                $order_nutri->amount = $orderNutri->amount;
                $order_nutri->save();
            }
        }
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
            $gender = $user->gender;
            $level = $user->level;
            $orderNutris = $this->orderNutris->where('age', $age)
                ->where('gender', $gender)
                ->where('level', $level)
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
}
