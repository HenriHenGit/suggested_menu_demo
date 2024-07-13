<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Food_nutri;
use App\Models\Nutri;
use App\Models\Ingredient;
use App\Models\Category_ingre;
use App\Models\Recipe_detail;
use App\Models\Step_recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class AdminFoodController extends Controller
{

    private $nutris;
    private $foodNutris;
    private $recipeDetails;
    private $ingredients;
    private $stepRecipes;
    private $category_ingre;
    private $foods;
    private $foodId;


    public function __construct(Nutri $nutris, Food_nutri $foodNutris, Recipe_detail $recipeDetails, Ingredient $ingredients, Step_recipe $stepRecipes, Category_ingre $category_ingre, Food $foods)
    {
        $this->nutris = $nutris;
        $this->foodNutris = $foodNutris;
        $this->recipeDetails = $recipeDetails;
        $this->ingredients = $ingredients;
        $this->stepRecipes = $stepRecipes;
        $this->category_ingre = $category_ingre;
        $this->foods = $foods;
    }




    public function addIngredient(Request $request, $id)
    {
        $request->validate([
            'ingredient_id' => 'required|integer|exists:ingredients,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $idIngre = $request->input('ingredient_id');
        $checkRecipeDetails = $this->recipeDetails->where('ingredient_id', $idIngre)
            ->where('food_id', $id)
            ->first();

        if (!$checkRecipeDetails) {
            $recipe_detail = new Recipe_detail();
            $recipe_detail->ingredient_id = $request->input('ingredient_id');
            $recipe_detail->food_id = $id;
            $recipe_detail->amount = $request->input('amount');
            $recipe_detail->unit = 'g';
            $recipe_detail->save();
        } else {
            $checkRecipeDetails->amount = $checkRecipeDetails->amount + $request->input('amount');
            $checkRecipeDetails->save();
        }

        $food = $this->foods->findOrFail($id);
        $food->status = 'added ingredient';
        $food->save();

        $ingredient = $this->ingredients->findOrFail($idIngre);

        $this->insertFoodNutri($id);

        return redirect()->route('admin.foods.edit', ['id' => $id])->with('Thêm nguyên liệu ' . strtolower($ingredient) . ' vào món ăn ' . strtolower($food->food_name) . ' thành công');
    }

    public function deleteIngre($foodId, $ingreId)
    {
        $ingredient = $this->ingredients->find($ingreId);

        $recipeDetail = $this->recipeDetails->where('ingredient_id', $ingreId)
            ->where('food_id', $foodId)
            ->first();

        if (!$recipeDetail) {
            return redirect()->route('admin.ingredients.index')->with('error', 'Nguyên liệu không tồn tại.');
        }

        $recipeDetail->delete();

        $checkRecipe = $this->recipeDetails->where('food_id', $foodId)->get();

        if (count($checkRecipe) > 0) {
            $food = $this->foods->findOrFail($foodId);
            $food->status = 'added ingredient';
            $food->save();
        } else {
            $food = $this->foods->findOrFail($foodId);
            $food->status = 'pending ingredient';
            $food->save();
        }

        $this->insertFoodNutri($foodId);

        return redirect()->route('admin.foods.edit', ['id' => $foodId])->with('success', 'Nguyên liệu ' . strtolower($ingredient->name) . ' đã được xóa khỏi món ăn ' . strtolower($food->food_name) . '.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        $foodIds = Food::select('id')->get();
        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required|string|max:255',
            'category_food_id' => 'required|string',
            'desc' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'number_eat' => 'required|numeric|min:1',
            'recipes.*.content' => 'nullable|string',
            'recipes.*.img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imagePath = 'food_' . time() . '_' . Str::random(5) . '.' . $request->file('img')->extension();
            $request->file('img')->move(public_path('images/foods'), $imagePath);
        } else {
            $imagePath = null;
        }

        $food = new Food();
        $food->food_name = $request->input('food_name');
        $food->category_food_id = $request->input('category_food_id');
        $food->desc = $request->input('desc');
        $food->img = $imagePath;
        $food->number_eat = $request->input('number_eat');
        $food->status = 'pending ingredient';
        $food->save();

        $foodId = $food->id;

        $stepRecipesArr = $request->input('recipes', []);
        foreach ($stepRecipesArr as $index => $stepRecipe) {
            if (!empty($stepRecipe['content'])) {
                $stepRecipeInstance = new Step_recipe();
                $stepRecipeInstance->content = $stepRecipe['content'];
                $stepRecipeInstance->sort_step = $index;
                $stepRecipeInstance->food_id = $foodId;

                $recipeId = $stepRecipeInstance->id;

                if ($request->hasFile("recipes.$index.img")) {
                    $imageName = 'step_' . time() . '_' . Str::random(5) . '.' . $request->file("recipes.$index.img")->extension();
                    $request->file("recipes.$index.img")->move(public_path('images/step_recipes'), $imageName);
                    $stepRecipeInstance->img = $imageName;
                }
                $stepRecipeInstance->save();
            }
        }

        return redirect()->route('admin.foods.index')->with('success', 'Thêm món ăn ' . $food->food_name . ' thành công');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);
        $foodNutris = $this->foodNutris->where('food_id', $id)
            ->where('nutri_id', '!=', '0')
            ->get();

        $nutris = $this->nutris->where('id', '!=', '0')->get();
        $recipeDetails = $this->recipeDetails->where('food_id', $id)->get();
        $ingredientIds = $recipeDetails->pluck('ingredient_id')->toArray();
        $ingredients = $this->ingredients->whereIn('id', $ingredientIds)->get();
        $stepRecipes = $this->stepRecipes->where('food_id', $id)->get();
        return view('admin.foods.show', compact('food', 'foodNutris', 'nutris', 'recipeDetails', 'ingredients', 'stepRecipes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recipeDetails = $this->recipeDetails->where('food_id', $id)->get();

        $ingredientIds = $recipeDetails->pluck('ingredient_id')->unique();

        $ingredientFood = $this->ingredients->whereIn('id', $ingredientIds)->get();

        $ingredients = $this->ingredients->all();

        $categoryIngres = $this->category_ingre->all();

        $food = $this->foods->find($id);
        $stepRecipes = $this->stepRecipes->where('food_id', $id)->orderBy('sort_step')->get();
        return view('admin.foods.edit', compact('food', 'stepRecipes', 'ingredientFood', 'recipeDetails', 'ingredients', 'categoryIngres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'food_name' => 'required|string|max:255',
            'category_food_id' => 'required|string',
            'desc' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'number_eat' => 'required|numeric',
            'recipes.*.content' => 'nullable|string',
            'recipes.*.img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $food = Food::find($id);
        if (!$food) {
            return redirect()->route('admin.foods.index')->with('error', 'Món ăn không tồn tại');
        }


        if ($request->hasFile('img')) {
            $imagePath = 'food_' . time() . '_' . Str::random(5) . '.' . $request->file('img')->extension();
            $request->file('img')->move(public_path('images/foods'), $imagePath);
            $food->img = $imagePath;
        } elseif ($request->hasFile('img_old')) {

            $imagePath = 'food_' . time() . '_' . Str::random(5) . '.' . $request->file('img_old')->extension();
            $request->file('img_old')->move(public_path('images/foods'), $imagePath);
            $food->img = $imagePath;
        }


        $food->food_name = $request->input('food_name');
        $food->category_food_id = $request->input('category_food_id');
        $food->desc = $request->input('desc');
        $food->number_eat = $request->input('number_eat');
        $food->save();


        $stepRecipesArr = $request->input('recipes', []);
        foreach ($stepRecipesArr as $index => $stepRecipeData) {
            if (!empty($stepRecipeData['content'])) {

                $stepRecipe = Step_recipe::where('food_id', $id)->where('sort_step', $index + 1)->firstOrNew();
                $stepRecipe->content = $stepRecipeData['content'];
                $stepRecipe->food_id = $id;


                if ($request->hasFile("recipes.$index.img")) {
                    $imageName = 'step_' . time() . '_' . Str::random(5) . '.' . $request->file("recipes.$index.img")->extension();
                    $request->file("recipes.$index.img")->move(public_path('images/step_recipes'), $imageName);
                    $stepRecipe->img = $imageName;
                } elseif ($request->hasFile("recipes.$index.img_old")) {
                    $imageName = 'step_' . time() . '_' . Str::random(5) . '.' . $request->file("recipes.$index.img_old")->extension();
                    $request->file("recipes.$index.img_old")->move(public_path('images/step_recipes'), $imageName);
                    $stepRecipe->img = $imageName;
                } else {
                    $stepRecipe->img = null;
                }

                $stepRecipe->save();
            }
        }

        return redirect()->route('admin.foods.index')->with('success', 'Cập nhật món ăn ' . strtolower($food->food_name) . ' thành công');
    }




    /**
     * Remove.
     */
    public function delete($id)
    {
        $food = Food::find($id);


        if (!$food) {
            return redirect()->route('admin.foods.index')->with('error', 'Món ăn không tồn tại.');
        }


        $food->delete();


        return redirect()->route('admin.foods.index')->with('success', 'Món ăn ' . strtolower($food->food_name) . ' đã được xóa.');
    }
}
