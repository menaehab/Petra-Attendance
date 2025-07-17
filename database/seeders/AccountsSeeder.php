<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        $attendance_officers = [
            [
                'name' => 'attendance',
                'email' => 'attendance@petra.com',
                'password' => 'attendance123456',
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

        $teachers = [
            [
                'name' => 'marola',
                'email' => 'marola@petra.com',
                'password' => 'marola123456',
            ],
            [
                'name' => 'passent',
                'email' => 'passent@petra.com',
                'password' => 'passent123456',
            ],
            [
                'name' => 'kermina',
                'email' => 'kermina@petra.com',
                'password' => 'kermina123456',
            ],
            [
                'name' => 'wassem',
                'email' => 'wassem@petra.com',
                'password' => 'wassem123456',
            ],
            [
                'name' => 'tervena',
                'email' => 'tervena@petra.com',
                'password' => 'tervena123456',
            ]
        ];

        foreach ($attendance_officers as $attendance_officer) {
            $attendance_officer =User::updateOrCreate([
                'email' => $attendance_officer['email'],
            ], [
                'name' => $attendance_officer['name'],
                'email' => $attendance_officer['email'],
                'password' => Hash::make($attendance_officer['password']),
            ]);
            $attendance_officer->syncRoles('attendance_officer');
        }
        foreach ($admins as $admin) {
            $admin = User::updateOrCreate([
                'email' => $admin['email'],
            ], [
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make($admin['password']),
            ]);

            $admin->syncRoles('admin');
        }
        foreach ($teachers as $teacher) {
            $teacher = User::updateOrCreate([
                'email' => $teacher['email'],
            ], [
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'password' => Hash::make($teacher['password']),
            ]);

            $teacher->syncRoles('teacher');
        }
    }
}