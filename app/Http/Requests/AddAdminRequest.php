<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:table_users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|min:11'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Admin name is required.',
            'name.string' => 'Admin name must be text.',
            'name.max' => 'Admin name must not exceed 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'Unable to complete the request. Please check your information and try again.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.min' => 'Password must be 11 number.',
        ];
    }
}
