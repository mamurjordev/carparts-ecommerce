<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{

    public function index()
    {
        $settings = [];
        $datas = DB::table('settings')
            ->whereIn('key', [
                'sitemap',
                'robot_text',
                'site_title',
                'slogan',
                'store_label',
                'main_page_title',
            ])
            ->select('key', 'value')
            ->get();
        foreach ($datas as $data) {
            $settings[$data->key] = $data->value;
        }
        return $settings;
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            DB::table('settings')->where('key', $key)->update([
                'value' => $value
            ]);
        }
        return 'SEO erfolgreich aktualisiert';
    }
}
