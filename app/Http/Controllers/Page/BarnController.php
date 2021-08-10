<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Barn;
use App\Models\farmerGroup;
use Illuminate\Http\Request;

class BarnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Lumbung';
        $data['farmerGroups'] = farmerGroup::orderBy('name', 'ASC')->get();
        $data['barns'] = Barn::with('farmer_group')->orderBy('name', 'ASC')->get();
        return view('pages.lumbung.index', $data);
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
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'farmer_group_id' => 'required|string',
        ]);

        $barn = Barn::create([
            'name' => $request->name,
            'address' => $request->address,
            'farmer_group_id' => $request->farmer_group_id,
        ]);

        if ($barn) :
            return redirect()->route('barn.index')->with('success', 'Data lumbung berhasil di simpan.');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barn  $barn
     * @return \Illuminate\Http\Response
     */
    public function show(Barn $barn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barn  $barn
     * @return \Illuminate\Http\Response
     */
    public function edit(Barn $barn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barn  $barn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barn $barn)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'farmer_group_id' => 'required|string',
        ]);

        $barn->update([
            'name' => $request->name,
            'address' => $request->address,
            'farmer_group_id' => $request->farmer_group_id,
        ]);

        if ($barn) :
            return redirect()->route('barn.index')->with('success', 'Data lumbung berhasil di update.');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barn  $barn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barn $barn)
    {
        $barn->delete();
        if ($barn) :
            return redirect()->route('barn.index')->with('success', 'Data lumbung berhasil di hapus.');
        endif;
    }
}
