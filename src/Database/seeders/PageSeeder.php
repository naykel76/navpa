<?php

namespace Database\Seeders;

use Naykel\Navpa\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        $home = Page::create([
            'title' => 'Home Page',
            'slug' => 'index',
            'show_title' => false,
            'published_at' => now(),
            'layout_type' => 'advanced',
        ]);

        $about = Page::create([
            'title' => 'About Us',
            'slug' => 'about',
            'published_at' => now(),
            'image_path' => 'content/naykel-400.png',
            'body' => 'Welcome to the about us page.',
        ]);

        $privacy = Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'published_at' => now(),
        ]);

        $terms = Page::create([
            'title' => 'Terms of Use',
            'slug' => 'terms-of-use',
            'published_at' => now(),
        ]);

        $faqs = Page::create([
            'title' => 'Frequently Asked Questions',
            'slug' => 'frequently-asked-questions',
            'published_at' => now(),
        ]);
    }
}
