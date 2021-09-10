<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Halaman Pesanan Anda';
        $data['carts'] = Cart::where('user_id', Auth::user()->id)->where('status', '!=', 'proses')->orderBy('id', 'DESC')->get();
        return view('pages.checkout.index', $data);
    }

    public function admin()
    {
        $data['title'] = 'Halaman Pesanan User';
        $data['carts'] = Cart::where('status', '!=', 'proses')->orderBy('id', 'DESC')->get();
        return view('pages.checkout.admin', $data);
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

    public function proses(Request $request)
    {
        // dd($request->checkout);
        $cart = [];
        for ($i = 0; $i < count($request->checkout); $i++) :
            // $cart[$i] = $request->checkout[$i];
            $cart[$i] = Cart::with(['foodItem', 'user'])->find($request->checkout[$i]);
        endfor;

        // dd($cart);
        $data['title'] = 'Halaman Checkout';
        $data['cart'] = $cart;
        return view('pages.cart.show', $data);
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
            'cart_id' => 'required',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'total_price' => 'required',
            'file' => 'required',
        ]);

        try {

            $total_price = Crypt::decrypt($request->total_price);
        } catch (Exception $error) {
            return redirect()->back()->with('danger', 'Pesanan gagal di buat.');
        }

        $file = $request->file('file')->store('assets/checkout_bukti_transfer', 'public');
        for ($i = 0; $i < count($request->cart_id); $i++) :
            $cart_id = Crypt::decrypt($request->cart_id[$i]);
            Checkout::create([
                'name' => $request->name,
                'address' => $request->address,
                'cart_id' => $cart_id,
                'total_price' => $total_price,
                'file' => $file,
            ]);
            $cart[$i] = Cart::find($cart_id)->update([
                'status' => 'berhasil'
            ]);
        endfor;

        return redirect()->route('cart.index')->with('success', 'Pesanan berhasil di buat.');
        // if ($checkout) :


        //     // $cart = Cart::find($cart_id);
        //     // $cart->update([
        //     //     'status' => 'berhasil'
        //     // ]);

        // endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
