<?php

namespace App\Http\Requests;

class UpdateNewsRequest extends StoreNewsRequest
{
    public function rules(): array
{
    return [
        'title' => ['required', 'string', 'max:255'],
        'excerpt' => ['nullable', 'string'],
        'content' => ['required', 'string'], 
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'is_published' => ['nullable', 'boolean'],
    ];
}
}
