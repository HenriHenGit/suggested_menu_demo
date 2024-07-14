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


        return redirect()->route('account.index')->with('success', 'Thông tin của bạn đã được cập nhật thành công.');
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
}
