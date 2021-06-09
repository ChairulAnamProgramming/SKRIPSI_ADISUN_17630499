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
}
