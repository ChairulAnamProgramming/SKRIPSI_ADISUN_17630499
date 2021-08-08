<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Barn;
use App\Models\Cart;
use App\Models\FoodItem;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Report';
        $data['barns'] = Barn::orderBy('name', 'ASC')->get();
        $data['users'] = User::where('role', 'user')->orderBy('name', 'ASC')->get();
        return view('pages.report.index', $data);
    }

    public function stokPangan(Request $request)
    {

        $from = $request->from;
        $to = $request->to;
        $data['title'] = 'Laporan Stok Barang Tanggal ' . date('d-m-Y', strtotime($from)) . ' Sampai ' . date('d-m-Y', strtotime($to));

        $data['foodItems'] = FoodItem::whereBetween('created_at', [$from, $to])
            ->get();

        return view('pages.report.pages.stok-pangan', $data);
    }

    public function stokPanganPerlumbung(Request $request)
    {

        $data['title'] = 'Laporan Stok Barang Bulan ' . date('F', strtotime($request->bulan));

        $data['barn'] = Barn::find($request->barn_id);
        $data['foodItems'] = FoodItem::where('barn_id', $request->barn_id)
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.stok-pangan-perlumbung', $data);
    }

    public function pesananUser(Request $request)
    {

        $data['user'] = User::find($request->user_id);
        $data['title'] = 'Laporan Pesanan ' . $data['user']->name . ' Bulan ' . date('F', strtotime($request->bulan));

        $data['barn'] = Barn::find($request->barn_id);
        $data['carts'] = Cart::with('foodItem')
            ->where('user_id', $request->user_id)
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.pesanan-user', $data);
    }

    public function pesanan(Request $request)
    {
        $data['title'] = 'Laporan Pesanan Semua User Bulan ' . date('F', strtotime($request->bulan));

        $data['barn'] = Barn::find($request->barn_id);
        $data['carts'] = Cart::with('foodItem')
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.pesanan', $data);
    }

    public function pengelolaLumbung(Request $request)
    {
        $data['title'] = 'Laporan Pengelola Lumbung Bulan ' . date('F', strtotime($request->bulan));

        $data['barns'] = Barn::with(['farmer_group', 'farmer_group.farmers', 'food_items'])
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.pengelola-lumbung', $data);
    }

    public function pesananPanganTerbanyak(Request $request)
    {
        $data['title'] = 'Laporan Pesanan Pangan Terbanyak Bulan ' . date('F', strtotime($request->bulan));

        $data['foodItems'] = FoodItem::whereHas('carts', function ($q) use ($request) {
            $q->whereYear('created_at', date('Y', strtotime($request->bulan)))
                ->whereMonth('created_at', date('m', strtotime($request->bulan)));
        })
            ->get()
            ->sortByDesc(function ($cek) {
                return $cek->carts->count();
            });



        return view('pages.report.pages.pesanan-pangan-terbanyak', $data);
    }

    public function pesananPanganBelumDiTerima(Request $request)
    {

        $data['title'] = 'Laporan Pesanan Pangan Belum Di Terima User Bulan ' . date('F', strtotime($request->bulan));

        $data['carts'] = Cart::with('foodItem')
            ->where('status', 'dikirim')
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.pesanan-pangan-belum-diterima', $data);
    }

    public function pesananPanganBelumDiKonfirmasi(Request $request)
    {

        $data['title'] = 'Laporan Pesanan Pangan Belum Di Konfirmasi Bulan ' . date('F', strtotime($request->bulan));

        $data['carts'] = Cart::with('foodItem')
            ->where('status', 'berhasil')
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.pesanan-pangan-belum-dikonfirmasi', $data);
    }

    public function pesananMasihDiKeranjang(Request $request)
    {

        $data['title'] = 'Laporan Pesanan Masih Di Keranjang User Bulan ' . date('F', strtotime($request->bulan));

        $data['carts'] = Cart::with('foodItem')
            ->where('status', 'proses')
            ->whereYear('created_at', date('Y', strtotime($request->bulan)))
            ->whereMonth('created_at', date('m', strtotime($request->bulan)))
            ->get();

        return view('pages.report.pages.pesanan-masih-di-keranjang', $data);
    }
}
