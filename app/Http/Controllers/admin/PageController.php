<?php

namespace App\Http\Controllers\admin;

use App\Models\Page;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;

class PageController extends Controller
{
    public function index()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Pages/List', [
            'pages' => DB::table('pages')->paginate('10')
        ]);
    }

    public function create()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Pages/Form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);
        $page = new Page();
        $page->name = $request->name;
        $page->slug = Str::slug($page->name);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->status = $request->status;

        if ($request->image) {
            $page->image = (new FileController)->uploadFile($request->image, '/pages/');
        }
        $page->save();
        return back()->with('success', 'Page created successfully!');
    }

    public function edit(Page $page)
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Pages/Form', [
            'page' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $page->name = $page->deletable == 1 ? $request->name : $page->name;
        $page->slug = Str::slug($page->name);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->status = $request->status;

        if ($request->image) {
            $page->image = (new FileController)->updateFile($page->image, $request->image, '/pages/');
        }
        $page->save();
        return back()->with('success', 'Page updated successfully!');
    }

    public function delete()
    {
    }
}
