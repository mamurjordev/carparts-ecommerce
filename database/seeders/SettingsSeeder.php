<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'bank_name' => '',
            'branch_name' => '',
            'account_name' => '',
            'account_number' => '',
            'swift_code' => '',
            'branch_code' => '',
            'robot_text' => '',
            'sitemap' => true,
            'main_logo' => 'logo.png',
            'site_title' => 'Car Parts',
            'slogan' => 'Autoteile für Pkw, Lkw und Motorräder',
            'store_label' => '',
            'main_page_title' => '',
            'copyright' => 'Urheberrechte © 2021 Car Parts | Alle Rechte vorbehalten.',
            'contact_us_footer' => 'Wenn Sie Fragen haben, weil Sie etwas nicht finden konnten, teilen Sie uns einfach per WhatsApp oder telefonisch 00436769285502 mit, was benötigt wird, damit wir es sofort für Sie finden können. WIR HABEN ALLE TEILE, DIE SIE BENÖTIGEN !!!',
            'vat' => true,
            'zero_vat' => 0,
            'reduced_vat' => 0,
            'standard_vat' => 0

        ];

        foreach ($settings as $key => $value) {
            \App\Models\Setting::create(
                [
                    'key' => $key,
                    'value' => $value
                ],
            );
        }
        \App\Models\Setting::create(
            [
                'key' => 'facebook',
                'value' => ''
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'twitter',
                'value' => ''
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'youtube',
                'value' => ''
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'instagram',
                'value' => ''
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'phone',
                'value' => '00436769285502'
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'email',
                'value' => 'info@carparts-point.at'
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'location',
                'value' => 'Pottenstein'
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'working_hours',
                'value' => ''
            ]
        );
        \App\Models\Setting::create(
            [
                'key' => 'footer_links',
                'value' => '[{"id":1,"name":"Kontaktiere uns","slug":"contact-us"},{"id":2,"name":"\u00dcber uns","slug":"about-us"},{"id":3,"name":"Datenschutz-Bestimmungen","slug":"privacy-policy"},{"id":4,"name":"Gesch\u00e4ftsbedingungen","slug":"terms-and-conditions"},{"id":5,"name":"R\u00fcckgaberecht","slug":"refund-policy"}]'
            ]
        );
    }
}
