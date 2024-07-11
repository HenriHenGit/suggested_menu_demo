<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nutri;
use App\Models\Order_nutri;
use App\Models\User;
use App\Models\User_detail;

class UserDisplayController extends Controller
{
    private $orderNutris;
    private $user;
    private $nutris;
    private $userDetail;

    public function __construct(Order_nutri $orderNutris, User $user, Nutri $nutris, User_detail $userDetail)
    {
        $this->orderNutris = $orderNutris;
        $this->user = $user;
        $this->nutris = $nutris;
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

    public function index()
    {
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

        $nutris = $this->nutris->all();

        return view('user.display.index', [
            'userDetail' => $userDetail ? $userDetail->toArray() : [],
            'nutris' => $nutris
        ]);
    }
}