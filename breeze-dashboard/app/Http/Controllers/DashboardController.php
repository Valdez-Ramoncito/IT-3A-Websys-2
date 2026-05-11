<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $salesData = Sale::selectRaw('SUM(amount) as total, MONTHNAME(sale_date) as month, MIN(sale_date) as min_date', [])
            ->groupBy('month')
            ->orderBy('min_date')
            ->get();

        $labels = $salesData->pluck('month');
        $data   = $salesData->pluck('total');

        return view('dashboard', compact('labels', 'data'));
    }
}
