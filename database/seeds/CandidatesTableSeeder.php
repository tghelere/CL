<?php

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::truncate();

        factory(Candidate::class)->times(2)->create();
    }
}
