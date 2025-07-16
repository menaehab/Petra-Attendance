<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level1 = [
            [
                'name' => 'scratch JR',
                'level_id' => 1,
            ],
            [
                'name' => 'computer basics JR',
                'level_id' => 1,
            ],
            [
                'name' => 'course 3',
                'level_id' => 1,
            ],
        ];
        $level2 = [
            [
                'name' => 'scratch',
                'level_id' => 2,
            ],
            [
                'name' => 'computer basics',
                'level_id' => 2,
            ],
            [
                'name' => 'office',
                'level_id' => 2,
            ],
        ];
        $level3 = [
            [
                'name' => 'python',
                'level_id' => 3,
            ],
            [
                'name' => 'web',
                'level_id' => 3,
            ],
            [
                'name' => 'arduino',
                'level_id' => 3,
            ],
        ];

        foreach ($level1 as $course) {
            Course::updateOrCreate([
                'name' => $course['name'],
                'level_id' => $course['level_id'],
            ], [
                'name' => $course['name'],
                'level_id' => $course['level_id'],
            ]);
        }
        foreach ($level2 as $course) {
            Course::updateOrCreate([
                'name' => $course['name'],
                'level_id' => $course['level_id'],
            ], [
                'name' => $course['name'],
                'level_id' => $course['level_id'],
            ]);
        }
        foreach ($level3 as $course) {
            Course::updateOrCreate([
                'name' => $course['name'],
                'level_id' => $course['level_id'],
            ], [
                'name' => $course['name'],
                'level_id' => $course['level_id'],
            ]);
        }
    }
}
