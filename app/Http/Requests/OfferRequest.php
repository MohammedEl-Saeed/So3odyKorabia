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
        if($this->method('Field') == 'POST') {
            return [
                'code' => 'required|unique:offers',
                'discount' => 'required|numeric|max:100',
                'uses_number' => 'nullable|numeric',
//                'discount_type' => 'required|in:value,percent',
                'start_at' => 'required|date|after:now',
                'end_at' => 'required|date|after:start_date'
            ];
        } elseif ($this->method('Field') == 'PUT'){
            return [
                'code' => 'required|unique:offers,code,'.$this->offer,
                'discount' => 'required|numeric|max:100',
                'uses_number' => 'nullable|numeric',
//                'discount_type' => 'required|in:value,percent',
                'start_at' => 'required|date',
                'end_at' => 'required|date|after:start_date',
                'status' => 'in:Available,Unavailable,Expired,Closed,Reopened'
            ];
        }
    }

}
