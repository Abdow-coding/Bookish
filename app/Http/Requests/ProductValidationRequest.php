<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductValidationRequest extends FormRequest
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
    $isUpdate = $this->route('id') !== null;

    return [
        'cover' => [
            $isUpdate ? 'nullable' : 'required',
            'image',
            'mimes:jpg,jpeg,png,webp',
            'max:2048',
        ],
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'condition' => 'required|in:New,Used',
        'status' => 'required|in:Active,non Active',
        'description' => 'nullable|string|max:60000',
    ];
}


public function messages(): array
{
    return [
        'cover.required'     => 'The book cover is required.',

        'title.required'     => 'The book title is required.',

        'author.required'    => 'The author name is required.',

        'category.required'  => 'The category is required.',

        'price.required'     => 'The price is required.',

        'stock.required'     => 'The stock quantity is required.',

        'condition.required' => 'The book condition is required.',

        'status.required'    => 'The status is required.',

        'description.required'    => 'The Description is required.'
    ];
}
}
