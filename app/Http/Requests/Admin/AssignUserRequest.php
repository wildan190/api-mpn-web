<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AssignUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Bisa diatur sesuai kebijakan
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ];
    }
}
