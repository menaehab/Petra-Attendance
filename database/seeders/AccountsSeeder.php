<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Fady Emad',
                'email' => 'fadi@petra.com',
                'password' => '22843730',
            ],
            [
                'name' => 'Mena Ehab',
                'email' => 'mena@petra.com',
                'password' => 'menamena',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@petra.com',
                'password' => 'password',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
