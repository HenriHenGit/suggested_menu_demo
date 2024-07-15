<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Menu;
use App\Models\Food;
use App\Models\Nutri;
use App\Models\Food_nutri;
use App\Models\Order_nutri;
use App\Models\Recipe_detail;
use App\Models\Ingredient;
use App\Models\Step_recipe;
use App\Models\User_detail;

class AdminUserController extends Controller
{
    private $users;
    private $foods;
    private $foodNutris;
    private $orderNutris;
    private $nutris;
    private $recipeDetails;
    private $ingredients;
    private $stepRecipes;
    private $userDetail;
    private $menus;

    public function __construct(Food $foods, Food_nutri $foodNutris, Order_nutri $orderNutris, Nutri $nutris, Recipe_detail $recipeDetails, Ingredient $ingredients, Step_recipe $stepRecipes, User_detail $userDetail, Menu $menus, User $users)
    {
        $this->foods = $foods;
        $this->foodNutris = $foodNutris;
        $this->orderNutris = $orderNutris;
        $this->nutris = $nutris;
        $this->recipeDetails = $recipeDetails;
        $this->ingredients = $ingredients;
        $this->stepRecipes = $stepRecipes;
        $this->userDetail = $userDetail;
        $this->menus = $menus;
        $this->users = $users;
    }

    public function deleteFood($foodId, $userId)
    {

        $menu = $this->menus->where('food_id', $foodId)->where('user_id', $userId)->first();

        if ($menu) {

            $menu->status = false;
            $menu->save();
        }

        return redirect()->route('admin.users.edit', ['id' => $userId])->with('success', 'Xóa món ăn thành công');
    }

    public function addFood($foodId, $userId, $newFood)
    {
        if ($foodId == $newFood) {
            return redirect()->route('admin.users.edit', ['id' => $userId])->with('error', 'Món ăn đã có trong đề xuất');
        }

        $menu = $this->menus->where('food_id', $foodId)->where('user_id', $userId)->first();


        if ($menu) {
            $menu->food_id = $newFood;
            $menu->status = true;
            $menu->save();
            return redirect()->route('admin.users.edit', ['id' => $userId])->with('success', 'Thêm món ăn thành công');
        }
    }

    public function index()
    {
        $users = $this->users->where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:15',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|in:1,2',
            'password' => 'required|string|min:6',
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();


        $orderNutris = Order_nutri::where('age', $user->age)
            ->where('gender', $user->gender)
            ->get();
        $this->insertUserDetail($orderNutris, $user->id);
        $this->insertMenu($user->id);

        return redirect()->route('admin.users.index')->with('success', 'Thêm người dùng ' . $user->name . ' thành công');
    }

    public function show($id)
    {
        $user = $this->users->find($id);
        $nutris = $this->nutris->where('id', '!=', '0')->get();
        $userDetails = $this->userDetail->where('user_id', $id)->paginate(6);


        $menus = $this->menus->where('user_id', $id)->get();
        $foodIds = $menus->pluck('food_id')->unique();
        $foods = $this->foods->whereIn('id', $foodIds)->get();

        return view('admin.users.show', compact('user', 'userDetails', 'nutris', 'foods'));
    }

    public function edit($id)
    {
        $user = $this->users->find($id);
        $foodAll = $this->foods->all();
        $nutris = $this->nutris->where('id', '!=', '0')->get();
        $userDetails = $this->userDetail->where('user_id', $id)->paginate(6);


        $menus = $this->menus->where('user_id', $id)->get();
        if ($menus->isEmpty())
            $foodAll = [];
        $foodIds = $menus->pluck('food_id')->unique();
        $foods = $this->foods->whereIn('id', $foodIds)->paginate(5);

        return view('admin.users.edit', compact('user', 'foodAll', 'nutris', 'userDetails', 'foods', 'menus'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'phone' => 'nullable|string|max:255',
            'age' => 'required|integer|min:18|max:120',
            'gender' => 'required|integer',
        ]);

        $user = User::findOrFail($id);
        $user->phone = $request->input('phone');
        if ($request->input('age') > 69) {
            $user->age = 70;
        } else {
            $user->age = $request->input('age');
        }
        $user->gender = $request->input('gender');
        $user->save();

        $gender = $user->gender;

        $orderNutris = Order_nutri::where('age', $user->age)
            ->where('gender', $gender)
            ->get();
        $this->updateUserDetail($orderNutris, $id);
        $this->updateMenu($id);

        return redirect()->route('admin.users.edit', ['id' => $user->id])->with('success', 'Thông tin ' . $user->name . ' đã được cập nhật thành công');
    }

    public function delete($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa thành công');
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
