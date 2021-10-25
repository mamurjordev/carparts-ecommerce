<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function reifen()
    {
        return Inertia::render('TireSelection');
    }

    public function show($carId)
    {
        // $vehicles = DB::table('cars')->where('carId', $carId)
        //     ->join('manufacturers as manu', 'manu.manuId', 'cars.manuId')
        //     ->select('cars.carName', 'manu.manuName')
        //     ->first();
        $vehicle = DB::table('vehicleDetails')->where('carId', $carId)->where('lang', 'en')->first();

        // $categories = DB::table('assemblyGroupNodesNames as parent')
        //     ->whereIn('parent.assemblyGroupNodeId', [701954, 100006, 100005, 100002, 100018, 200569, 200061, 100010, 100113, 200048, 100003, 100001, 100002, 100241, 100223, 200624, 100254, 100012, 200053, 100211, 100015, 100238, 100243, 703602, 100400, 100240, 200115, 704170, 100210, 200598])
        //     ->where('parent.lang', env('APP_LANG'))
        //     ->leftJoin('link_str_id', 'new_str_id', 'parent.assemblyGroupNodeId')
        //     ->select('parent.assemblyGroupName', 'parent.assemblyGroupNodeId', 'old_str_id as image')
        //     ->distinct()
        //     ->get();
        $categories = DB::table('assemblyGroupNodesNames')
            ->whereIn('assemblyGroupNodeId', [100004, 100400, 100013, 100015, 100006, 200059, 100010, 100011, 200047, 100238, 100241, 704842, 100339, 100341, 100001, 100243, 200987, 100254, 100214, 100007, 100050, 100012, 100002, 200057, 100014, 200063, 100016, 100018, 100342, 100685, 100019, 100417, 704415, 100343, 200067, 100008])
            ->where('lang', env('APP_LANG'))
            // ->leftJoin('link_str_id', 'new_str_id', 'assemblyGroupNodeId')
            // ->select('assemblyGroupName', 'assemblyGroupNodeId', 'old_str_id as image')
            ->select('assemblyGroupName', 'assemblyGroupNodeId')
            ->orderBy('assemblyGroupName')
            ->distinct()
            ->get();

        return Inertia::render('Categories')
            // ->with('parts', $assemblis)
            ->with('vehicle', $vehicle)
            ->with('categories', $categories);
    }

    public function subCategories($car_id, $category_id)
    {
        $vehicle = DB::table('vehicleDetails')->where('carId', $car_id)->first();

        $parent = DB::table('assemblyGroupNodesNames')
            ->where('assemblyGroupNodeId', $category_id)
            ->where('lang', env('APP_LANG'))
            ->select('assemblyGroupName', 'assemblyGroupNodeId')->first();

        $subCategories = DB::table('assemblyGroupNodesNames')
            ->where('parentNodeId', $category_id)
            ->where('lang', env('APP_LANG'))
            ->select('assemblyGroupName', 'assemblyGroupNodeId')
            ->orderBy('assemblyGroupName')
            ->distinct()
            ->get();
        $categories = DB::table('assemblyGroupNodesNames')
            ->whereIn('assemblyGroupNodeId', [100004, 100400, 100013, 100015, 100006, 200059, 100010, 100011, 200047, 100238, 100241, 704842, 100339, 100341, 100001, 100243, 200987, 100254, 100214, 100007, 100050, 100012, 100002, 200057, 100014, 200063, 100016, 100018, 100342, 100685, 100019, 100417, 704415, 100343, 200067, 100008])
            ->where('lang', env('APP_LANG'))
            // ->leftJoin('link_str_id', 'new_str_id', 'assemblyGroupNodeId')
            // ->select('assemblyGroupName', 'assemblyGroupNodeId', 'old_str_id as image')
            ->select('assemblyGroupName', 'assemblyGroupNodeId')
            ->orderBy('assemblyGroupName')
            ->distinct()
            ->get();

        return Inertia::render('SubCategories', [
            'vehicle' => $vehicle,
            'parent' => $parent,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }
}
