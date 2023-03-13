<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'open_date' => ['required', 'date', 'after:today'],
            'first_closure_date' => ['required', 'date', 'after:open_date'],
            'final_closure_date' => ['required', 'date', 'after_or_equal:first_closure_date']
        ];
    }
}
