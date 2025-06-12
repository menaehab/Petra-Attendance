<?php

namespace App\Http\Requests;

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
            'code' => 'string|max:255|unique:students,code',
            'group_id' => 'integer',
        ];
    }
}
