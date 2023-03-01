<?php

namespace App\Http\Requests;

use App\Rules\CoordinatorRule;
use Illuminate\Foundation\Http\FormRequest;

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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string', 'unique:departments'],
            'coordinator_id' => ['bail', 'nullable', 'numeric', 'exists:users,id', 'unique:departments', new CoordinatorRule]
        ];
    }
}
