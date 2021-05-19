<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequestUpdate extends FormRequest
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
            'name'          => 'string',
            'telephone'     => 'string',
            'email'         => 'email:rfc,dns',
            'city'          => 'string',
            'state_id'      => 'exists:states,id',
            'category_id'   => 'exists:categories,id',
        ];
    }
}
