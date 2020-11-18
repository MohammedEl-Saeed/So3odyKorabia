<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'code' => 'required|unique:offers',
            'discount'=>'required|numeric',
            'discount_type'=>'required|in:value,percent',
            'start_at' => 'required|date|after:now',
            'end_date' => 'required|date|after:start_date'
        ];
    }

}
