<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'first_name'=>['required', 'string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'dob' => ['required','date'],
            'gender'=>['required', 'numeric'],
            'email'=>['required', 'string', 'max:255', 'email', 'unique:users'],
            'password' =>['required', 'string', 'min:8', 'confirmed'],
            'role' => ['string','required'],
            'department_id' => ['nullable','numeric']
        ];
    }
}
