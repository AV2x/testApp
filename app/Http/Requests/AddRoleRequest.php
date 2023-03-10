<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role_id' => 'required|integer|exists:App\Models\Role,id',
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'Обязательно выбрать роль',
            'role_id.exists' => 'Такой роли не существует',
        ];
    }
}
