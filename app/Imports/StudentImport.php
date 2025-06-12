<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToArray, WithValidation,SkipsOnFailure,WithHeadingRow
{
    use SkipsFailures;
    /**
    * @param array $array
    */
    public function array(array $array)
    {
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
            __('keywords.name') => 'required|string|max:255',
            __('keywords.phone') => 'nullable',
            __('keywords.code') => 'unique:students,code',
            __('keywords.group_id') => 'required|exists:groups,name',
        ];
    }
}