<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Page::create([
            'name' => 'Kontaktiere uns',
            'title' => '',
            'slug' => 'contact-us',
            'content' => '',
            'deletable' => false,
            'status' => 'publish'
        ]);
        \App\Models\Page::create([
            'name' => 'Über uns',
            'title' => '',
            'slug' => 'about-us',
            'content' => '',
            'deletable' => false,
            'status' => 'publish'
        ]);
        \App\Models\Page::create([
            'name' => 'Datenschutz-Bestimmungen',
            'title' => '',
            'slug' => 'privacy-policy',
            'content' => '',
            'deletable' => false,
            'status' => 'publish'
        ]);
        \App\Models\Page::create([
            'name' => 'Geschäftsbedingungen',
            'title' => '',
            'slug' => 'terms-and-conditions',
            'content' => '',
            'deletable' => false,
            'status' => 'publish'
        ]);
        \App\Models\Page::create([
            'name' => 'Rückgaberecht',
            'title' => '',
            'slug' => 'refund-policy',
            'content' => '',
            'deletable' => false,
            'status' => 'publish'
        ]);
        \App\Models\Page::create([
            'name' => 'Benutzerdefinierte Seite',
            'title' => '',
            'slug' => 'custom-page',
            'content' => '',
        ]);
    }
}
