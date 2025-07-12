<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdateGroupsLevelIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            'level 1' => 1,
            'level 2' => 2,
            'level 3' => 3,
        ];
        Group::all()->each(function ($group) use ($levels) {
            $group->level_id = $levels[$group->level];
            $group->save();
        });
    }
}
