<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'vehicles' => Vehicle::count(),
            'brands' => Brand::count(),
            'models' => CarModel::count(),
            'colors' => Color::count(),
        ];

        $recentVehicles = Vehicle::with('brand', 'model', 'color')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentVehicles'));
    }
}
