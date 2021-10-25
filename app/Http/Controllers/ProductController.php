<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products()
    {
        return Inertia::render('Products', [
            'parts' => DB::table('articles')
                ->where('articles.assemblyGroupNodeId', 200063)
                ->join('articleText', 'articleText.legacyArticleId', '=', 'articles.legacyArticleId')
                ->select('articles.*')
                ->distinct()->paginate(50)
        ]);
    }
}
