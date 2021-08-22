<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class categoryController extends Controller
{

    public function index(Request $request)
    {

        $categoris = Category::all();
        if (Route::currentRouteName() == 'home-ar') {
            return view('homeAr', ["categoris" => $categoris]);
        }

        return view('home', ["categoris" => $categoris]);
    }

    public function subCat(Request $request)
    {

        $main_id = $request->category_id;


        $subcategories = category::where('id', $main_id)
            ->with('subcategory')
            ->get();

        return response()->json([
            'subcategories' => $subcategories
        ], 200);
    }

    public function items(Request $request)
    {

        $subcategory_id = $request->subcategory_id;

        $items = Item::where('category_id', $subcategory_id)->get();

        return response()->json([
            'items' => $items
        ], 200);
    }
}
