<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(SolutionsTableSeeder::class);
        $this->call(TestimoniesTableSeeder::class);
        $this->call(NewslettersTableSeeder::class);
        // $this->call(StatesTableSeeder::class); //comentar após semear
        // $this->call(CitiesTableSeeder::class); //comentar após semear
        $this->call(CandidatesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(OmbudsTableSeeder::class);
        $this->call(BudgetsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
    }
}
