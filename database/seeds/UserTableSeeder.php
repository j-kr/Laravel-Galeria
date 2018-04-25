<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'R S',
        	'email' => 'email@emial.com',
        	'password' => Hash::make('pass') ,
        ]);

        User::create([
        	'name' => 'John Doe',
        	'email' => 'doe@emial.com',
        	'password' => Hash::make('pass') ,
        ]);
    }
}
