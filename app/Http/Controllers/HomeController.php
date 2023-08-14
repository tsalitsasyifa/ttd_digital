<?php

namespace App\Http\Controllers;
use App\Charts\DashboardChart;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DashboardChart $dashboardChart)
    {
        return view('home', ['dashboardChart'=> $dashboardChart ->build()]);
    }
    
}
