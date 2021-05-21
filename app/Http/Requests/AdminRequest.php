<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'city' => 'required|min:5|max:20',
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required|min:5|max:100',
            'category' => 'required|integer',
            'state' => 'required|integer'
        ];
    }
}
