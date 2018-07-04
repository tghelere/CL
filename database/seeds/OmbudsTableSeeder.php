<?php

use Illuminate\Database\Seeder;
use App\Models\Ombud;

class OmbudsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ombud::truncate();

        factory(Ombud::class)->times(2)->create();
    }
}
