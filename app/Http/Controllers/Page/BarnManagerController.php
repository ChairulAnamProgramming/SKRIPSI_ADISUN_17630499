<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Barn;
use Illuminate\Http\Request;

class BarnManagerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pengelola Lumbung';
        $data['barns'] = Barn::with(['farmer_group', 'farmer_group.farmers', 'food_items'])->get();
        return view('pages.Pengelola-Lumbung.index', $data);
    }
}
