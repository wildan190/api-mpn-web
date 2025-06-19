<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'instagram_link' => 'nullable|url|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'youtube_link' => 'nullable|url|max:255',
        ];
    }
}
