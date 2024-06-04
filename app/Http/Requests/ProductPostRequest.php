<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductPostRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|string',
            // 'slug' => 'required',
            'small_description' => 'string|required|min:3',
            'description' => 'string|required|min:3',
            'regular_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'qty' => 'required|integer|between:1,10',
            'tax' => 'required|integer',
            'meta_title' => 'required|string',
            'meta_description' => 'required',
            'status' => 'nullable',
            'trending' => 'nullable',
            'meta_keywords' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:2048',
        ];
    }
}
