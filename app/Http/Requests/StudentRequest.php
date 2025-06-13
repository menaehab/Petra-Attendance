<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'phone' => 'string|max:11',
            'code' => [
                'string',
                'max:255',
                Rule::unique('students', 'code')->ignore($this->student),
            ],
            'group_id' => 'integer',
        ];
    }
}
