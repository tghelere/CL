<?php

use Illuminate\Database\Seeder;
use App\Models\Ebook;

class EbooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ebook::truncate();

        Ebook::create([
            'title'  => 'Título do ebook',
            'url'  => 'http://www.google.com',
            'image' => 'temp.jpg',
        ]);
    }
}
