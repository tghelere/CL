<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\Solution;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_post')->truncate();
        Category::truncate();

        $services = Service::all()->pluck('title')->toArray();
        $solutions = Solution::all()->pluck('title')->toArray();
        
        $categories = array_merge($services, $solutions);

        foreach ($categories as $key => $value) {
            Category::create([
                'name'  => $value,
                'slug' => str_slug($value),
            ]);
        }
    }
}
