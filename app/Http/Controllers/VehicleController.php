<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function index()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Vehicle/List', [
            'vehicles' => DB::table('vehicleDetails')->where('lang', 'en')->orderBy('manuName')->paginate(20)
        ]);
    }

    public function edit($carID)
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Vehicle/Form', [
            'vehicle' => DB::table('vehicleDetails')->where('carId', $carID)->first(),
            'models' => DB::table('modelSeries')->orderBy('modelname')->select('modelId', 'modelname')->distinct()->get(),
            'brands' => DB::table('manufacturers')
                ->where('linkingTargetType', 'p')
                ->where('manuName', 'NOT LIKE', '%MOTORCYCLE%')
                ->select('manuId', 'manuName')
                ->distinct()
                ->get()
        ]);
    }
}
