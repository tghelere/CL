<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::truncate();

        User::create([
        	'name' => 'Thyago Ghelere',
        	'email' => 'ghelere@outlook.com',
        	'password' => bcrypt('123dev'),
        ]);

        // factory(User::class)->times(10)->create();
        
    }
}
