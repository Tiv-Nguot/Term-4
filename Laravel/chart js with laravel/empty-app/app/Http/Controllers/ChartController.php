<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function showChart()
    {
        $data = [ /* Your chart data */ ];
        return view('chart', compact('data'));
    }
}
