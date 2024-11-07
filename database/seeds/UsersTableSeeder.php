<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();


        // User::create([
        DB::table('users')->insert([
        [
            'name' => 'admin1',
            'email' => 'admin1@aa.com',
          //  'password' => bcrypt('123456'),
            'password' => Hash::make('123456'),
        ],
        [
            'name' => 'admin2',
            'email' => 'admin2@aa.com',
          //  'password' => bcrypt('123456'),
            'password' => Hash::make('123456'),
        ],
        [
            'name' => 'admin3',
            'email' => 'admin3@aa.com',
          //  'password' => bcrypt('123456'),
            'password' => Hash::make('123456'),
        ]
        ]);
        //طريقة اخرى
      //  User::create(['name' => 'ahmed','email' => 'aa@aa.com','password' => bcrypt('100200300')]);

    }
}
