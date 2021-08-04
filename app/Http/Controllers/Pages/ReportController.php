<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Report';
        return view('pages.report.index', $data);
    }
}
