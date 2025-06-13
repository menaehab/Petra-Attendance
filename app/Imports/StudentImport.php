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
    public $group_id;
    public function __construct($group_id)
    {
        $this->group_id = $group_id;
    }
    public function array(array $array)
    {
        foreach ($array as $row) {
            Student::create([
                'name' => $row['name'],
                'phone' => (string) $row['phone'],
                'code' => $row['code'],
                'group_id' => $this->group_id,
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
            'name' => 'required|string|max:255',
            'phone' => 'nullable',
            'code' => 'unique:students,code',
        ];
    }
}
