<?php

use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Newsletter::truncate();

        factory(Newsletter::class)->times(2)->create();
    }
}
