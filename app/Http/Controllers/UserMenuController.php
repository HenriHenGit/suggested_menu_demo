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
        $userId = session('userId');
        $this->meals = Cache::get('meal_' . $userId);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Nhận request id của người dùng (demo vd: 2)
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
}
