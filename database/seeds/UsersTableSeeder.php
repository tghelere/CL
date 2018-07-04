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
        User::create([
        	'name' => 'Centrallimp',
        	'email' => 'serv.centrallimp@gmail.com',
        	'password' => bcrypt('mkt-2018'),
        ]);

        // factory(User::class)->times(10)->create();        
    }
}
