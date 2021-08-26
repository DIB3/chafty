<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Demo user',
                'email' => 'demo@gmail.com',
                'password' => bcrypt('demo1234'),
                'avatar' => 'demo.png'
            ],
            [
                'name' => 'akrem',
                'email' => 'akrem@gmail.com',
                'password' => bcrypt('12345678'),
                'avatar' => 'akrem.jpg'
            ],
            [
                'name' => 'jandour',
                'email' => 'jandour@gmail.com',
                'password' => bcrypt('12345678'),
                'avatar' => 'jandour.png'
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
