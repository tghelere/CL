<?php

use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\Service;
use App\Models\Solution;
use Faker\Generator as Faker;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Content::truncate();

        $pages = ['home', 'quem-somos', 'contato', 'blog', 'ouvidoria', 'trabalhe-conosco'];
        $services_pages = Service::all()->pluck('slug')->toArray();
        $solutions_pages = Solution::all()->pluck('slug')->toArray();

        $pages = array_merge($pages, $services_pages, $solutions_pages);

        foreach ($pages as $key => $value) {
            Content::create([
                'page'  => $value,
                'content' => $faker->text($maxNbChars = 600),                
            ]);    
        }

    }
}
