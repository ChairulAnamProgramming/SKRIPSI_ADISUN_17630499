<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Barn;
use App\Models\FoodCategory;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Stok Pangan';
        $data['barns'] = Barn::all();
        $data['foodCategories'] = FoodCategory::orderBy('name', 'ASC')->get();
        $data['foodItems'] = FoodItem::with(['barn', 'food_category'])->get();
        return view('pages.Stok-Pangan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'food_category_id' => 'required|string',
            'stock' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'barn_id' => 'required|string',
        ]);

        if ($request->file('image')) :
            $image = $request->file('image')->store('assets/FoodItems', 'public');
        else :
            $image = 'default.png';
        endif;

        $foodItem = FoodItem::create([
            'title' => $request->title,
            'food_category_id' => $request->food_category_id,
            'stock' => $request->stock,
            'description' => $request->description,
            'price' => $request->price,
            'barn_id' => $request->barn_id,
            'image' => $image,
        ]);

        if ($foodItem) :
            return redirect()->route('foodItem.index')->with('success', 'Stok Barang Berhasil di Simpan.');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $foodItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodItem $foodItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $foodItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $foodItem)
    {
        //
    }
}
