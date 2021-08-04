<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Keranjang belanja anda';
        $data['carts'] = Cart::with(['foodItem', 'user'])
            ->where('user_id', Auth::user()->id)
            ->where('status', 'proses')
            ->get();

        return view('pages.cart.index', $data);
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
            'quantity' => 'required|string|max:255',
            'food_item_id' => 'required|string'
        ]);

        $cart = Cart::create([
            'user_id' => Auth::user()->id,
            'food_item_id' => $request->food_item_id,
            'quantity' => $request->quantity,
            'status' => 'proses',
        ]);

        if ($cart) :
            return redirect()->back()->with('success', 'Item berhasil di masukkan ke keranjang anda');
        endif;
        return redirect()->back()->with('danger', 'Item gagal di masukkan ke keranjang anda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data['title'] = 'Halaman Checkout';
        $data['cart'] = Cart::with(['foodItem', 'user'])->find($id);
        return view('pages.cart.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {

        try {
            $status = Crypt::decrypt($request->status);
        } catch (Exception $error) {
            return redirect()->back()->with('success', 'Item gagal di ' . $request->status . '.');
        }
        $cart->update([
            'status' => $status
        ]);

        if ($cart) :
            return redirect()->back()->with('success', 'Item berhasil di ' . $status . '.');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('success', 'Item berhasil di hapus dari keranjang.');
    }
}
