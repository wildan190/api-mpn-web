<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // tambahkan otorisasi sesuai kebutuhan
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name,'.$this->route('id'),
            'permissions' => 'array',          // optional: daftar id permission
            'permissions.*' => 'exists:permissions,id',
        ];
    }
}
