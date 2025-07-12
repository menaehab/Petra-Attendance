<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['name' => 'اشبال'],
            ['name' => 'مبتكرين'],
            ['name' => 'رواد'],
        ];

        foreach ($levels as $level) {
            Level::updateOrCreate([
                'name' => $level['name'],
            ], [
                'name' => $level['name'],
            ]);
        }
    }
}