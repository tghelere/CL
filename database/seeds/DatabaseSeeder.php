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
    }
}
