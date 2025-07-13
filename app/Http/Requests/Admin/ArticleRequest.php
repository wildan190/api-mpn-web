<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');  // Ambil ID dari URL route

        return [
            'title' => 'required|string|max:255',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'slug' => 'required|string|max:255|unique:articles,slug,'.($id ?: 'NULL'), // Menangani update dengan ID
            'date' => 'required|date',
            'article_body_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'alt_body_image' => 'nullable|string|max:255',
            'article_body' => 'required|string',
            'status' => 'required|in:draft,publish,delist',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ];
    }
}
