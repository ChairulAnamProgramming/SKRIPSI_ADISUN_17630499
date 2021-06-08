<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\FarmerGroup;
use Illuminate\Http\Request;

class FarmerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Kelompok Tani';
        $data['farmerGroups'] = FarmerGroup::with('farmers')->get();
        $data['farmer'] = Farmer::whereHas('user', function ($query) {
            $query->orderBy('name', 'ASC');
        })->get();
        return view('pages.kelompok-tani.index', $data);
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
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'chairman' => 'required',
            'farmer_id' => 'required',
        ]);

        $farmerGroup = FarmerGroup::create([
            'farmer_id' => $request->chairman,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        if ($farmerGroup) :
            $farmerGroup->farmers()->attach($request->farmer_id);
        endif;

        return redirect()->route('farmerGroup.index')->with('success', 'Data kelompok tani berhasil di simpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FarmerGroup  $farmerGroup
     * @return \Illuminate\Http\Response
     */
    public function show(FarmerGroup $farmerGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FarmerGroup  $farmerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmerGroup $farmerGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FarmerGroup  $farmerGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FarmerGroup $farmerGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmerGroup  $farmerGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmerGroup $farmerGroup)
    {
        //
    }
}
