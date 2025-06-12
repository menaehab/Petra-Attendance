<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToArray, WithValidation,SkipsOnFailure
{
    use SkipsFailures;
    /**
    * @param array $array
    */
    public function array(array $array)
    {
        unset($array[0]);
        foreach ($array as $row) {
            $group = Group::where('name', $row[3])->first();
            if (!$group) {
                continue;
            }
            Student::create([
                'name' => $row[0],
                'phone' => $row[1],
                'code' => $row[2],
                'group_id' => $group->id,
            ]);
        }
    }

     /**
     * Define validation rules for each row.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '0' => 'required|string|max:255',
            '1' => 'nullable',
            '2' => 'unique:students,code',
            '3' => 'required|exists:groups,name',
        ];
    }
}