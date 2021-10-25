<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Newsletters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewslettersController extends Controller
{
    public function index()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Newsletter/List', [
            'contents' => DB::table('newsletters')->paginate(20)
        ]);
    }

    public function create()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Newsletter/EmailCreation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:newsletters,email',
        ]);
        $newsletters = new Newsletters();
        $newsletters->email = $request->email;
        $newsletters->save();
        return response()->json([
            'success' => true,
            'msg' => 'email added successfully'
        ]);
    }

    public function destroy(Newsletters $newsletters)
    {
        $newsletters->delete();
        return back();
    }
}
