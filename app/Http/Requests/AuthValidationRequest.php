<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Override;

class AuthValidationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required','email','unique:table_users,email',],

            'phone_number' => ['required', 'string', 'max:20'],

            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
        ];
    }

    #[Override]
    public function messages()
    {
        return[
            'name.required'=>'The name field is required',
            'email.required'=>'The email field is required',
            'phone_number.required'=>'The phone number field is required',
            'password.required'=>'The password field is required',
            'password_confirmation.required'=>'The password confirmation field is required'
        ];
    }
}
