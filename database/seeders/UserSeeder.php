<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => 'admin',
            'last_name' => 'a',
            'email' => 'admina@ag.com',
            'display_picture_link' => 'images/display_picture/dp_1.jpg',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'role_id' => 1,
            'gender_id' => 2,
            'first_name' => 'admin',
            'last_name' => 'b',
            'email' => 'adminb@ag.com',
            'display_picture_link' => 'images/display_picture/dp_2.jpg',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'gender_id' => 1,
            'first_name' => 'user',
            'last_name' => 'a',
            'email' => 'usera@ag.com',
            'display_picture_link' => 'images/display_picture/dp_3.jpg',
            'password' => bcrypt('user1234'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'gender_id' => 2,
            'first_name' => 'user',
            'last_name' => 'b',
            'email' => 'userb@ag.com',
            'display_picture_link' => 'images/display_picture/dp_4.jpg',
            'password' => bcrypt('user1234'),
        ]);
    }
}
