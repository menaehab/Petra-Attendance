<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|exists:students,code',
            'group_id' => 'required|exists:groups,id',
            'session_id' => 'required|exists:sessions,id',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => __('keywords.code_required'),
            'code.exists' => __('keywords.code_exists'),
            'group_id.required' => __('keywords.group_required'),
            'group_id.exists' => __('keywords.group_exists'),
            'session_id.required' => __('keywords.session_required'),
            'session_id.exists' => __('keywords.session_exists'),
        ];
    }
}
