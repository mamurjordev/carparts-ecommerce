<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VinController extends Controller
{

    public function check()
    {
        $a = $this->vinDecode('WF0PXXGCHPKY64759');
        dd($a);
    }

    public function decode($vin_num)
    {
        $datas = json_decode(file_get_contents(storage_path() . '/app/public/json/vin-decode.json'));
        $manuName = $datas->decode[1]->value;
        $modelName = $datas->decode[8]->value;
        $fuelType = $datas->decode[23]->value;
        $prodStarted = $datas->decode[24]->value;
        $cylinder = $datas->decode[28]->value;
        $vehicles = DB::table('vehicleDetails')
            ->where('manuName', $manuName)
            ->where('modelName', 'LIKE',  $modelName . '%')
            ->where('yearOfConstrFrom', 'LIKE', $prodStarted . '%')
            ->where('cylinder', $cylinder)
            ->where('fuelType', $fuelType)
            ->where('lang', 'en')
            ->select('carId', 'manuName', 'modelName', 'typeName', 'powerKwFrom')
            ->distinct()
            ->orderBy('modelName')
            ->get();
        return $vehicles;
    }

    public function vinDecode($vin_num)
    {
        $apiPrefix = "https://api.vindecoder.eu/3.1";
        $apikey = "446428c1ab8b";   // Your API key
        $secretkey = "9143e09511";  // Your secret key
        $id = "decode";
        $vin = mb_strtoupper($vin_num);

        $controlsum = substr(sha1("{$vin}|{$id}|{$apikey}|{$secretkey}"), 0, 10);

        $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);
        $datas = json_decode($data);

        $infos = [];

        foreach ($datas->decode as $data) {
            $infos[$data->label] = $data->value;
        }

        $manuName = $infos['Make'];
        $modelName = $infos['Model'];
        $fuelType = $infos['Fuel Type - Primary'];
        $prodStarted = $infos['Production Started'] ?? null;
        $cylinder = $infos['Engine Cylinders'];
        if ($prodStarted) {
            $vehicles = DB::table('vehicleDetails')
                ->where('manuName', $manuName)
                ->where('modelName', 'LIKE',  $modelName . '%')
                ->where('yearOfConstrFrom', 'LIKE', $prodStarted . '%')
                ->where('cylinder', $cylinder)
                ->where('fuelType', $fuelType)
                ->where('lang', 'en')
                ->select('carId', 'manuName', 'modelName', 'typeName', 'powerKwFrom')
                ->distinct()
                ->orderBy('modelName')
                ->get();
        } else {
            $vehicles = DB::table('vehicleDetails')
                ->where('manuName', $manuName)
                ->where('modelName', 'LIKE',  $modelName . '%')
                ->where('cylinder', $cylinder)
                ->where('fuelType', $fuelType)
                ->where('lang', 'en')
                ->select('carId', 'manuName', 'modelName', 'typeName', 'powerKwFrom')
                ->distinct()
                ->orderBy('modelName')
                ->get();
        }
        return $vehicles;
    }
}
