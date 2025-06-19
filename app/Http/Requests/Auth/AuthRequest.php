<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $routeName = $this->route()->getName();

        return match ($routeName) {
            'auth.register' => [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ],
            'auth.login' => [
                'email' => 'required|email',
                'password' => 'required|string',
            ],
            default => [],
        };
    }
}
