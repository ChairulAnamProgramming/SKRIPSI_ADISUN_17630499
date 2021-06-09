<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['foodCategories'] = FoodCategory::orderBy('name', 'ASC')->get();
        $data['foodItems'] = FoodItem::with(['food_category', 'barn'])->orderBy('id', 'DESC')->paginate(8);
        return view('pages.home.index', $data);
    }

    public function foodItemByCategories($id)
    {
        $category = FoodCategory::find($id);
        $data['title'] = 'Kategori ' . $category->name;

        $data['foodItems'] = FoodItem::where('food_category_id', $id)->get();
        return view('pages.Kategori-Pangan.index', $data);
    }
}
