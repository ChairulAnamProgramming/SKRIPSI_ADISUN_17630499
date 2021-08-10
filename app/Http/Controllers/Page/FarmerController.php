<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Tani';
        $data['farmers'] = Farmer::with('user')->get();
        return view('pages.tani.index', $data);
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
            'username' => 'required|string|max:50|unique:users|regex:/^\S*$/u',
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'address' => 'required|string',
            'phone' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->nik),
            'role' => 'tani',
        ]);

        if ($user) :
            $farmer = Farmer::create([
                'user_id' => $user->id,
                'nik' => $request->nik,
                'address' => $request->address,
                'phone' => $request->phone,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
            ]);
        endif;

        if ($farmer) :
            return redirect()->route('farmer.index')->with('success', 'Data tani berhasil di simpan.');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'address' => 'required|string',
            'phone' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);

        $user = User::find($farmer->user_id);
        $user->update([
            'name' => $request->name,
        ]);

        if ($user) :
            $farmer->update([
                'nik' => $request->nik,
                'address' => $request->address,
                'phone' => $request->phone,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
            ]);
        endif;

        if ($farmer) :
            return redirect()->back()->with('success', 'Data tani berhasil di update.');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        $farmer->user->delete();
        if ($farmer) :
            return redirect()->back()->with('success', 'Data tani berhasil di hapus.');
        endif;
    }
}
