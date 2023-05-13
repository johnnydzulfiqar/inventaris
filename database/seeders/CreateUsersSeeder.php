<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'password' => bcrypt('naufa123'),
            ],
            [
                'name' => 'Kepala Tata Usaha',
                'email' => 'kepala@gmail.com',
                'type' => 2,
                'password' => bcrypt('naufa123'),
            ],
            [
                'name' => 'Tata Usaha',
                'email' => 'user@gmail.com',
                'type' => 0,
                'password' => bcrypt('naufa123'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
