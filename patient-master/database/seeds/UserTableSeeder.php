<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        \App\User::insert([
            [
                'name' => 'admin',
                'email' => 'jaf@hospital.com',
                'password' => bcrypt('jaf@hospital'),
                'role_id' => 1,
            ],
        ]);
    }
}
