<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Nutri;

class AdminNutriController extends Controller
{
    private $nutris;
    public function __construct(Nutri $nutris)
    {
        $this->nutris = $nutris;
    }


    public function index()
    {
        $nutris = $this->nutris->where('id', '!=', '0')->get();
        return view('admin.nutris.index', compact('nutris'));
    }

    public function show($id)
    {
        $nutri = $this->nutris->findOrFail($id);
        return view('admin.nutris.show', compact('nutri'));
    }

    public function create()
    {
        return view('admin.nutris.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'unit' => 'required|string|in:kcal,g,mg,µg',
            'id' => 'nullable|string|max:255',
        ]);



        $nutri = new Nutri();
        if (isset($request->id))
            $nutri->id = $request->id;
        else
            $nutri->id = $this->nutriId($request->name);

        $nutri->name = $request->name;
        $nutri->desc = $request->desc;
        $nutri->unit = $request->unit;


        $nutri->save();


        return redirect()->route('admin.nutris.index')->with('success', 'Thêm thành phần dinh dưỡng thành công!');
    }

    public function edit($id)
    {
        $nutri = $this->nutris->findOrFail($id);
        return view('admin.nutris.edit', compact('nutri'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'unit' => 'required|string|in:kcal,g,mg,µg',
            'id' => 'nullable|string|max:255',
        ]);


        $nutri = Nutri::findOrFail($id);

        if (isset($request->id))
            $nutri->id = $request->id;

        $nutri->name = $request->name;
        $nutri->desc = $request->desc;
        $nutri->unit = $request->unit;

        $nutri->save();

        return redirect()->route('admin.nutris.index')->with('success', 'Cập nhật thành phần dinh dưỡng thành công!');
    }

    public function delete($id)
    {

        $nutri = Nutri::findOrFail($id);

        if (preg_match('/^d.*/', $nutri->id)) {
            $nutri->delete();

            return redirect()->route('admin.nutris.index')->with('success', 'Xóa thành phần dinh dưỡng thành công!');
        } else {

            return redirect()->route('admin.nutris.index')->with('error', 'Đây là thành phần dinh dưỡng không thể xóa!');
        }
    }



    private function nutriId($nutriName)
    {
        $lenghtName = 4;
        $idName = preg_replace('/[^A-Za-z0-9]/', '', Str::upper(Str::ascii(Str::substr($nutriName, 0, 3))));

        $randomNumber = str_pad(rand(0, pow(10, $lenghtName) - 1), $lenghtName, '0', STR_PAD_LEFT);

        $id = 'd' . $idName . $randomNumber;

        return $id;
    }
}
