<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function models($manuId)
    {
        $models = DB::table('modelSeries')
            ->where('manuId', $manuId)
            ->where('linkingTargetType', 'p')
            ->select('modelId', 'modelName', 'yearOfConstrTo', 'yearOfConstrFrom')
            ->orderBy('modelName')
            ->distinct()
            ->get();
        return response()->json($models);
    }

    public function vehicleDetails($manuId, $modId)
    {
        $vehicleDetails = DB::table('vehicleDetails')
            ->where('manuId', $manuId)
            ->where('modId', $modId)
            ->where('lang', 'en')
            ->select('carId', 'typeName', 'fuelType', 'powerHpTo', 'powerHpFrom', 'powerKwFrom')
            ->orderBy('typeName')
            ->distinct()
            ->get();
        return response()->json($vehicleDetails);
    }

    public function getModifications($manuId, $modId)
    {
        DB::table('cars')->where('manuId', $manuId)->where('modId', $modId)->select('carId', 'carName')->first();
    }

    public function search($search)
    {
        $strlen = strlen($search);
        if ($strlen == 17) {
            $data = [
                'parts' => [],
                'oems' => [],
                'vins' =>  $this->searchVIN($search)
            ];
            return response()->json($data);
        }

        $parts = $this->searchParts($search);
        $oems = $this->searchOEM($search);
        $data = [
            'parts' => $parts,
            'oems' => $oems,
            'vins' => []
        ];
        return response()->json($data);
    }

    public function searchVIN($vin)
    {
        return (new VinController)->vinDecode($vin);
    }

    public function searchParts($search)
    {
        $parts = DB::table('assemblyGroupNodesNames')
            ->where('assemblyGroupName', 'LIKE', "{$search}%")
            ->where('lang', 'de')
            ->select('assemblyGroupName')
            ->distinct()
            ->limit('20')
            ->get();
        return $parts;
    }

    public function searchOEM($oem_no)
    {
        $searches = DB::table('artcicleCrossesReady')
            ->where('oemNumber', 'LIKE',  $oem_no . '%')->distinct()
            ->limit(20)->get();
        return $searches;
    }
}
