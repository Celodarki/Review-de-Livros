<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'sometimes|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
}