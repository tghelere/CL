<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Solution;

class BannersTableSeeder extends Seeder
{
    private $pages = ['quem-somos', 'contato', 'blog', 'ouvidoria', 'trabalhe-conosco'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::truncate();

        
        $services_pages = Service::all()->pluck('slug')->toArray();
        $solutions_pages = Solution::all()->pluck('slug')->toArray();

        // Home (mais de 1 e tem texto)
        for ($i=1; $i <= 4; $i++) { 
            Banner::create([
                'page'  => 'home',
                'image' => "banner{$i}.jpg",
                'title' => "Título do texto {$i}",
                'description' => "Descrição do texto {$i}",
                'link' => "teste/{$i}",
                'colorbox' => '#000',
            ]);
        }

        // Pages
        foreach ($this->pages as $key => $value) {
            Banner::create([
                'page'  => $value,
                'image' => 'banner01.jpg',                
            ]);
        }

        // Services
        foreach ($services_pages as $key => $value) {
            Banner::create([
                'page'  => $value,
                'image' => 'banner02.jpg',                
            ]);
        }
        
        // Solutions
        foreach ($solutions_pages as $key => $value) {
            Banner::create([
                'page'  => $value,
                'image' => 'banner03.jpg',                
            ]);
        }

    }
}
