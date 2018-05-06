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
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin') ,
        ]);

        User::create([
            'id' => 6,
            'name' => 'a',
            'email' => 'a@a.a',
            'password' => Hash::make('aaaaaa') ,
        ]);

        User::create([
            'name' => 'b',
            'email' => 'b@b.b',
            'password' => Hash::make('bbbbbb') ,
        ]);
    }
}
