<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'status' => 'required|in:coming soon,released',
            'upload_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
