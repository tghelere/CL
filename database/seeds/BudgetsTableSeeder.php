<?php

use Illuminate\Database\Seeder;
use App\Models\Budget;

class BudgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Budget::truncate();

        factory(Budget::class)->times(25)->create();
    }
}
