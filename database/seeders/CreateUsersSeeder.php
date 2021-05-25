<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make(12345678),
                'photo' => 'user.jpg',
                'roles_id' => 2
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make(12345678),
                'photo' => 'admin.jpg',
                'roles_id' => 1
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
