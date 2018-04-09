<?php

use Illuminate\Database\Seeder;
use App\Models\Testimony;

class TestimoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::truncate();

        factory(Testimony::class)->times(10)->create();
    }
}
