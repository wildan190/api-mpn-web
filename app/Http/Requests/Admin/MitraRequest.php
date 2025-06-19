<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MitraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mitra_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'mitra_name' => 'required|string|max:255',
            'mitra_description' => 'nullable|string',
            'web_link' => 'nullable|url|max:255',
        ];
    }
}
