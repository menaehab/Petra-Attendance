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
                'name' => 'user',
                'email' => 'user@petra.com',
                'password' => 'user123456',
            ]
        ];
        $admins = [
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
                'password' => 'p@ssw0rd',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate([
                'email' => $user['email'],
            ], [
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
        foreach ($admins as $admin) {
            $admin = User::updateOrCreate([
                'email' => $admin['email'],
            ], [
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make($admin['password']),
            ]);

            $admin->assignRole('admin');
        }
    }
}
