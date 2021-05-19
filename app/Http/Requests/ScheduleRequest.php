<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'name'          => 'required|string',
            'telephone'     => 'required|string',
            'email'         => 'required|email:rfc,dns|unique:schedules',
            'city'          => 'required|string',
            'state_id'      => 'required|exists:states,id',
            'category_id'   => 'required|exists:categories,id',
        ];
    }
}
