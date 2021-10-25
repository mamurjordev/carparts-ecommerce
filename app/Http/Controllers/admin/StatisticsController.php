<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticsController extends Controller
{
    public function index()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Statistics/List');
    }
}
