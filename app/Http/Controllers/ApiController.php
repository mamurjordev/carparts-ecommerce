<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function subcategory($section_id)
    {
        $subs = DB::table('assemblyGroupNodesNames')
            ->where('parentNodeId', $section_id)
            ->where('lang', 'de')
            ->join('link_str_id', 'new_str_id', 'assemblyGroupNodesNames.assemblyGroupNodeId')
            ->select('assemblyGroupName', 'old_str_id')
            ->distinct()
            ->get();

        return response()->json($subs);
    }
}
