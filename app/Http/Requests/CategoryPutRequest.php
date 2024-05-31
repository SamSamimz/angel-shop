<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryPutRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('categories', 'name')->ignore($this->category)
            ],
            'description' => 'string|required|min:3',
            'meta_title' => 'required|string',
            'meta_description' => 'required',
            'status' => 'nullable',
            'popular' => 'nullable',
            'meta_keywords' => 'required',
            'image' => 'nullable|image|mimes:png,jpg|max:2048',
        ];
    }
}
