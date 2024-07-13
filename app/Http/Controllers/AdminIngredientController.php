<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Category_ingre;
use App\Models\Ingredient_detail;
use App\Models\Nutri;

class AdminIngredientController extends Controller
{
    private $ingredients;
    private $categoryIngres;
    private $ingredientDetails;
    private $nutris;

    public function __construct(Ingredient $ingredients, Category_ingre $categoryIngres, Nutri $nutris, Ingredient_detail $ingredientDetails)
    {
        $this->ingredients = $ingredients;
        $this->categoryIngres = $categoryIngres;
        $this->ingredientDetails = $ingredientDetails;
        $this->nutris = $nutris;
    }
    public function index()
    {
        $ingredients = $this->ingredients->paginate(10);
        $categoryIngres = $this->categoryIngres->all();
        return view('admin.ingredients.index', compact('ingredients', 'categoryIngres'));
    }
    public function show($id)
    {
        $ingredient = $this->ingredients->findOrFail($id);
        $ingredientDetails = $this->ingredientDetails->where('ingredient_id', $id)
            ->where('amount', '!=', 0)
            ->get();
        $nutris = $this->nutris->all();
        return view('admin.ingredients.show', compact('ingredient', 'ingredientDetails', 'nutris'));
    }

    public function create()
    {
        $categoryIngres = $this->categoryIngres->all();
        $nutris = $this->nutris->where('name', '!=', '0')
            ->get();
        return view('admin.ingredients.create', compact('nutris', 'categoryIngres'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'category_ingre_id' => 'required|string|exists:category_ingres,id',
            'amount' => 'required|numeric|min:1',
            'nutri' => 'nullable|array',
            'nutri.*' => 'nullable|numeric|min:0',
        ]);


        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
        $ingredient->category_ingre_id = $request->category_ingre_id;
        $ingredient->save();

        $ingredientId = $ingredient->id;

        $nutris = $request->nutri;
        $ingreAmount = $request->amount;
        foreach ($nutris as $nutri_id => $amount) {
            if ($amount != null) {
                $nutriAmount = $this->totalAmountNutri($ingreAmount, $amount);
                $ingredientDetail = new Ingredient_detail();
                $ingredientDetail->ingredient_id = $ingredientId;
                $ingredientDetail->nutri_id = $nutri_id;
                $ingredientDetail->amount = $nutriAmount;
                $ingredientDetail->save();
            }
        }
        return redirect()->route('admin.ingredients.index')->with('success', 'Thêm nguyên liệu ' . strtolower($ingredient->name) . ' thành công');
    }

    public function edit($id)
    {
        $nutris = $this->nutris->where('name', '!=', '0')
            ->get();
        $categoryIngres = $this->categoryIngres->all();
        $ingredient = $this->ingredients->findOrFail($id);
        $ingredientDetails = $this->ingredientDetails->where('ingredient_id', $id)->get();
        return view('admin.ingredients.edit', compact('nutris', 'categoryIngres', 'ingredient', 'ingredientDetails'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_ingre_id' => 'required|string|exists:category_ingres,id',
            'amount' => 'required|numeric|min:1',
            'nutri' => 'nullable|array',
            'nutri.*' => 'nullable|numeric|min:0',
        ]);

        $ingredient = $this->ingredients->findOrFail($id);
        $ingredient->name = $request->name;
        $ingredient->category_ingre_id = $request->category_ingre_id;
        $ingredient->save();

        $nutris = $request->nutri;
        $ingreAmount = $request->amount;

        foreach ($nutris as $nutri_id => $amount) {
            if ($amount != null) {
                $nutriAmount = $this->totalAmountNutri($ingreAmount, $amount);


                Ingredient_detail::updateOrCreate(
                    ['ingredient_id' => $id, 'nutri_id' => $nutri_id],
                    ['amount' => $nutriAmount]
                );
            }
        }

        return redirect()->route('admin.ingredients.index')->with('success', 'Cập nhật nguyên liệu ' . strtolower($ingredient->name) . ' thành công');
    }

    public function delete($id)
    {
        $ingredient = $this->ingredients->find($id);


        if (!$ingredient) {
            return redirect()->route('admin.ingredients.index')->with('error', 'Nguyên liệu không tồn tại.');
        }


        $ingredient->delete();


        return redirect()->route('admin.ingredients.index')->with('success', 'Nguyên liệu đã được xóa.');
    }



    private function totalAmountNutri($ingreAmount, $nutriAmount)
    {
        return $nutriAmount * ($ingreAmount / 100);
    }
}
