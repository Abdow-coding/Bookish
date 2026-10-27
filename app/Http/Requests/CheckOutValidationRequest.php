<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckOutValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:100'],
            'last_name' => ['required', 'string', 'min:2', 'max:100'],

            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[0-9+\s()-]{8,20}$/'],

            'address' => ['required', 'string', 'min:5', 'max:255'],
            'country' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],

            'notes' => ['nullable', 'string', 'max:1000'],

            'payment_method' => [
                'required'
            ],
        ];
    }
    public function messages(): array
{
    return [
        'first_name.required' => 'Please enter your first name.',
        'first_name.string' => 'First name must be a valid text.',
        'first_name.min' => 'First name must be at least 2 characters.',
        'first_name.max' => 'First name cannot exceed 100 characters.',

        'last_name.required' => 'Please enter your last name.',
        'last_name.string' => 'Last name must be a valid text.',
        'last_name.min' => 'Last name must be at least 2 characters.',
        'last_name.max' => 'Last name cannot exceed 100 characters.',

        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'email.max' => 'Email address cannot exceed 255 characters.',

        'phone.required' => 'Please enter your phone number.',
        'phone.regex' => 'Please enter a valid phone number.',

        'address.required' => 'Please enter your address.',
        'address.string' => 'Address must be valid text.',
        'address.min' => 'Address must be at least 5 characters.',
        'address.max' => 'Address cannot exceed 255 characters.',

        'country.required' => 'Please select your country.',
        'country.string' => 'Please select a valid country.',
        'country.max' => 'Country name cannot exceed 100 characters.',

        'city.required' => 'Please enter your city.',
        'city.string' => 'City must be valid text.',
        'city.max' => 'City name cannot exceed 100 characters.',

        'postal_code.required' => 'Please enter your postal code.',
        'postal_code.string' => 'Postal code must be valid text.',
        'postal_code.max' => 'Postal code cannot exceed 20 characters.',

        'notes.string' => 'Order notes must be valid text.',
        'notes.max' => 'Order notes cannot exceed 1000 characters.',

        'payment_method.required' => 'Please select a payment method.',
    ];
}

}
