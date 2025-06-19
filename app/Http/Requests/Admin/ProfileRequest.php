<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$userId}",
            'password' => 'nullable|string|min:6|confirmed',
        ];
    }
}
