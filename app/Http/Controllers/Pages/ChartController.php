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

        $tahun3 = FoodItem::whereYear('created_at', date('Y', strtotime('-2 year')))->count();
        $tahun2 = FoodItem::whereYear('created_at', date('Y', strtotime('-1 year')))->count();
        $tahun1 = FoodItem::whereYear('created_at', date('Y'))->count();

        $data['panganChartBulan'] = new PanganChart;
        $data['panganChartBulan']->labels([date('F', strtotime('-2 month')), date('F', strtotime('-1 month')), date('F')]);
        $data['panganChartBulan']->dataset('Stok Pangan', 'pie', [$bulan1, $bulan2, $bulan3])->backgroundColor(['#4287f5', '#4efc42', '#f5933d']);

        $data['panganChartTahun'] = new PanganChart;
        $data['panganChartTahun']->labels([date('Y'), date('Y', strtotime('-1 year')), date('Y', strtotime('-2 year'))]);
        $data['panganChartTahun']->dataset('Stok Pangan', 'bar', [$tahun1, $tahun2, $tahun3])->backgroundColor(['#f5433d', '#40f5da', '#b041f0']);
        return view('pages.charts.index', $data);
    }
}
