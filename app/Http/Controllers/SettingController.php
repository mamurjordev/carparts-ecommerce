<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function getSiteHeader()
    {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Settings/SiteHeader');
    }

    public function updateSiteHeader(Request $request)
    {
        dd($request);
    }

    public function site_setting()
    {
        return DB::table('settings')->whereIn('key', ['main_logo', 'site_title', 'slogan', 'copyright', 'contact_us_footer'])->select('id', 'key', 'value')->get();
    }
    public function updateSiteSetting(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            DB::table('settings')->where('key', $key)->update([
                'value' => $value
            ]);
        }
        return 'Setting updated successfully';
    }

    public function socials()
    {
        return DB::table('settings')
            ->whereIn('key', ['facebook', 'twitter', 'youtube', 'instagram'])
            ->select('id', 'key', 'value')->get();
    }

    public function updateSocials(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            DB::table('settings')->where('key', $key)->update([
                'value' => $value
            ]);
        }
        return 'Socials erfolgreich aktualisiert';
    }

    public function information()
    {
        $settings = [];
        $datas = DB::table('settings')
            ->whereIn('key', ['phone', 'email', 'location', 'working_hours'])
            ->select('id', 'key', 'value')->get();
        foreach ($datas as $data) {
            $settings[$data->key] = $data->value;
        }
        return $settings;
    }

    public function updateInformation(Request $request)
    {

        foreach ($request->all() as $key => $value) {
            DB::table('settings')->where('key', $key)->update([
                'value' => $value
            ]);
        }
        return 'Informationen erfolgreich aktualisiert';
    }

    public function Invoice()
    {
        $settings = [];
        $datas = DB::table('settings')
            ->whereIn('key', [
                'vat',
                'zero_vat',
                'reduced_vat',
                'standard_vat',
            ])
            ->select('id', 'key', 'value')->get();
        foreach ($datas as $data) {
            $settings[$data->key] = $data->value;
        }
        return $settings;
    }

    public function updateInvoice(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            DB::table('settings')->where('key', $key)->update([
                'value' => $value
            ]);
        }
        return 'Rechnung erfolgreich aktualisiert';
    }

    public function BankAccount()
    {
        $settings = [];
        $datas = DB::table('settings')
            ->whereIn('key', ['bank_name', 'branch_name', 'account_name', 'account_number', 'swift_code', 'branch_code'])
            ->select('key', 'value')
            ->get();
        foreach ($datas as $data) {
            $settings[$data->key] = $data->value;
        }
        return $settings;
    }

    public function updateBankAccount(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            DB::table('settings')->where('key', $key)->update([
                'value' => $value
            ]);
        }
        return 'Bankkonto wurde erfolgreich aktualisiert';
    }
}
