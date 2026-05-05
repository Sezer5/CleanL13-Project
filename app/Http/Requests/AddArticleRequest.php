<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|unique:article',
            'keyword_id' => 'required',
            'desc' => 'required|max:5000',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048'

        ];
    }

    public function messages(){
        return [
            'title.required' => 'Title field is required',
            'keyword_id.required' => 'Title field is required',
            'desc.max' => 'Thubnail is must not greater than : max characters',
            'thumbnail.max' => 'Thumbnail is must not greater 2MB',
            'thumbnail.image' => 'Thumbnail is must an image'
        ];
    }
}
