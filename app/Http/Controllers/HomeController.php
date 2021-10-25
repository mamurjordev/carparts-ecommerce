<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Home()
    {
        // dd(DB::table('vehicles')->orderBy('manuName')->select('manuId', 'manuName')->limit(10)->get());
        return Inertia::render('Home', [
            // 'brands' => DB::table('vehicles')->orderBy('manuName')
            //     ->where('manuName', 'NOT LIKE', '%motorcycle%')
            //     ->select('manuId', 'manuName')->distinct()->get()
            'brands' => DB::table('manufacturers')
                ->whereIn('manuId', [5, 16, 35, 36, 183, 72, 74, 80, 84, 93, 694, 104, 106, 111, 120, 121, 2, 881, 815, 819, 138, 185, 20, 64, 21, 139, 25, 700, 45, 1506, 1526, 55, 54, 56, 882, 184, 63, 1820, 842, 88, 92, 69, 1523, 77, 109, 175, 3328, 705, 107, 1138])
                // ->where('manuName', 'NOT LIKE', '%motorcycle%')
                ->select('manuId', 'manuName')->distinct()->orderBy('manuName')->get(),
            'featureBrands' => DB::table('manufacturers')
                ->whereIn('manuId', [5, 16, 21, 139, 35, 36, 45, 183, 184, 1820, 72, 74, 1523, 77, 88, 84, 80, 93, 104, 106, 109, 111, 120, 121])
                ->select('manuId', 'manuName')->distinct()->orderBy('manuName')->get(),
        ]);
    }
}
