<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@travel.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@travel.com',
                'password' => bcrypt('secret'),
                'role' => User::ROLE_ADMIN
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
