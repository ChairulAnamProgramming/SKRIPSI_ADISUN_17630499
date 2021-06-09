<?php

namespace App\Http\Controllers\Pages;

use App\Charts\PanganChart;
use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $data['title'] = 'Chart Pangan';

        $bulan1 = FoodItem::whereMonth('created_at', date('m', strtotime('-2 month')))->count();
        $bulan2 = FoodItem::whereMonth('created_at', date('m', strtotime('-1 month')))->count();
        $bulan3 = FoodItem::whereMonth('created_at', date('m'))->count();

        $data['panganChart'] = new PanganChart;
        $data['panganChart']->labels([date('F', strtotime('-2 month')), date('F', strtotime('-1 month')), date('F')]);
        $data['panganChart']->dataset('Stok Pangan', 'pie', [$bulan1, $bulan2, $bulan3])->backgroundColor(['green', 'purple', 'blue']);

        return view('pages.charts.index', $data);
    }
}
