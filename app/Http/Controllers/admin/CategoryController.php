<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        Inertia::setRootView('admin');
        $categories = DB::table('assemblyGroupNodesNames as child')
            ->where('child.lang', env('APP_LANG'))
            ->leftJoin('assemblyGroupNodesNames as parent', 'child.parentNodeId', '=', 'parent.assemblyGroupNodeId')
            ->where('parent.lang', env('APP_LANG'))
            ->select('child.assemblyGroupNodeId', 'child.assemblyGroupName as categoryName', 'parent.assemblyGroupName as parentName')
            ->distinct()
            ->orderBy('child.assemblyGroupName')
            ->paginate(20);

        return Inertia::render('admin/Category/List', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Category/Form', [
            'categories' => DB::table('assemblyGroupNodesNames')->where('lang', env('APP_LANG'))->select('assemblyGroupName', 'assemblyGroupNodeId')->distinct()->get(),
            'languages' => DB::table('languages')->where('lang', env('APP_LANG'))->select('languageCode', 'languageName')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'assemblyGroupName' => 'required',
            'lang' => 'required'
        ]);
        DB::table('assemblyGroupNodesNames')->insert([
            'assemblyGroupName' => $request->assemblyGroupName,
            'parentNodeId' => $request->parentNodeId,
            'lang' => $request->lang
        ]);
        if ($request->parentNodeId) {
            DB::table('assemblyGroupNodesNames')->where('assemblyGroupNodeId', $request->parentNodeId)->update([
                'hasChilds' => 1,
            ]);
        }
        return back()->with('success', 'Category updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Category/Form', [
            'category' => DB::table('assemblyGroupNodesNames')->where('assemblyGroupNodeId', $id)->where('lang', env('APP_LANG'))->first(),
            'categories' => DB::table('assemblyGroupNodesNames')->where('lang', env('APP_LANG'))->select('assemblyGroupName', 'assemblyGroupNodeId')->distinct()->get(),
            'languages' => DB::table('languages')->where('lang', env('APP_LANG'))->select('languageCode', 'languageName')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'assemblyGroupName' => 'required',
            'lang' => 'required'
        ]);
        DB::table('assemblyGroupNodesNames')->where('assemblyGroupNodeId', $id)->update([
            'assemblyGroupName' => $request->assemblyGroupName,
            'parentNodeId' => $request->parentNodeId,
            'lang' => $request->lang
        ]);
        if ($request->parentNodeId) {
            DB::table('assemblyGroupNodesNames')->where('assemblyGroupNodeId', $request->parentNodeId)->update([
                'hasChilds' => 1,
            ]);
        }
        return back()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
