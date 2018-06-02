<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Solution;

class BannersTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::truncate();

        $inst_pages = ['quem-somos', 'contato', 'ouvidoria', 'trabalhe-conosco', 'blog'];    
        $services_pages = Service::all()->pluck('slug')->toArray();
        $solutions_pages = Solution::all()->pluck('slug')->toArray();

        $pages = array_merge($inst_pages, $services_pages, $solutions_pages);

        // Home (pode ter texto)
        Banner::create([
            'page'  => 'home',
            'image' => "home-1.jpg",
        ]);
        Banner::create([
            'page'  => 'home',
            'image' => "home-2.jpg",
            'title' => "MAIS QUE FACILITIES!",
            'description' => "Serviços prestados nos mais altos padrões de qualidade!",
        ]);

        // Pages
        foreach ($pages as $key => $value) {
            Banner::create([
                'page'  => $value,
                'image' => $value . '.jpg',
            ]);
        }

    }
}
