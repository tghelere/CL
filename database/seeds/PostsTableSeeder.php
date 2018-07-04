<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_post')->truncate();
        Post::truncate();


        factory(Post::class)->times(2)->create();


        // faz o relacionamento dos posts com as categorias
        $categories = Category::all();

        Post::all()->each(function ($post) use ($categories) { 
            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

    }
}
