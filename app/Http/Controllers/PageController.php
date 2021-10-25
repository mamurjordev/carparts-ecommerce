<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function show($slug)
    {
        $data = DB::table('pages')->where('slug', $slug)->first();
        if ($slug == 'terms-and-conditions') {
            return $this->terms($data);
        } elseif ($slug == 'contact-us') {
            return $this->contact($data);
        }
    }

    public function terms($data)
    {
        return Inertia::render('TermsAndConditions', [
            'page' => $data
        ]);
    }

    public function contact($data)
    {
        $datas = DB::table('settings')
            ->whereIn('key', ['location', 'email', 'phone', 'working_hours'])
            ->select('key', 'value')
            ->get();
        $infos = [];
        foreach ($datas as $d) {
            $infos[$d->key] = $d->value;
        }
        return Inertia::render('ContactUs', [
            'page' => [
                'data' => $data,
                'info' => $infos
            ]
        ]);
    }

    public function commonPage()
    {
    }

    public function allPublished()
    {
        return DB::table('pages')->where('status', 'publish')->select('id', 'name', 'slug')->get();
    }
}
