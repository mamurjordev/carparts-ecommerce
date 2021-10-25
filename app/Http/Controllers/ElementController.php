<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ElementController extends Controller
{

    public function index()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Elements/List');
    }

    public function frontSiteFooter()
    {
        $datas = DB::table('settings')
            ->whereIn('key', ['contact_us_footer', 'footer_links', 'copyright', 'facebook', 'twitter', 'youtube', 'instagram', 'location', 'email', 'phone', 'working_hours'])
            ->select('key', 'value')
            ->get();
        $infos = [];
        foreach ($datas as $data) {
            $infos[$data->key] = $data->value;
        }
        return $infos;
    }

    public function frontSiteHeader()
    {
        $datas = DB::table('settings')
            ->whereIn('key', ['main_logo', 'site_title', 'slogan', 'phone'])
            ->select('key', 'value')
            ->get();
        $infos = [];
        foreach ($datas as $data) {
            $infos[$data->key] = $data->value;
        }
        return $infos;
    }

    public function siteFooter()
    {
        $data = DB::table('settings')->where('key', 'footer_links')->first();
        return json_decode($data->value);
    }

    public function updateSiteFooter(Request $request)
    {
        $setting = Setting::where('key', 'footer_links')->first();
        $setting->value = json_encode($request->pages);
        $setting->save();

        return 'Footer elements updated successfully!';
    }
}
