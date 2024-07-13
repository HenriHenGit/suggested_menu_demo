<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal_adjustments;

class AdminMenuController extends Controller
{
    public function index()
    {
        return view('admin.menus.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'level' => 'required|integer|between:1,3',
            'meal_per_day' => 'required|integer|min:1|max:4',
        ]);


        if (Meal_adjustments::count() > 0) {
            Meal_adjustments::truncate();
        }


        $meal = new Meal_adjustments();
        $meal->meal_per_day = $request->meal_per_day;
        $meal->timesFind = 100;


        switch ($request->level) {
            case 1:
                $meal->toleranceMeal = 3000;
                break;
            case 2:
                $meal->toleranceMeal = 5000;
                break;
            case 3:
                $meal->toleranceMeal = 7000;
                break;
            default:
                $meal->toleranceMeal = 7000;
                break;
        }


        $meal->save();


        return redirect()->route('admin.menus.index')->with('success', 'Dữ liệu đã được lưu thành công.');
    }
}
