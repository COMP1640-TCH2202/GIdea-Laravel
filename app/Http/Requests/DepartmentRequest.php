<?php

namespace App\Http\Requests;

use App\Rules\CoordinatorRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'department\'s name',
            'coordinator_id' => 'coordinator'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'string',
                Rule::unique('departments')->ignore($this->department?->id),
            ],
            'coordinator_id' => [
                'bail',
                'nullable',
                'numeric',
                'exists:users,id',
                Rule::unique('departments')->ignore($this->department?->id),
                new CoordinatorRule
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'coordinator_id.unique' => 'The :attribute has already been assigned to a different Department',
        ];
    }
}
