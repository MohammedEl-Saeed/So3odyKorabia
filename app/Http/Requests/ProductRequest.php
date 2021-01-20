<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $data  = [
            'name' => 'required',
            'description'=>'required',
            'logo' => 'required|mimes:jpeg,jpg,bmp,png,svg|max:20240',
            'type' => 'in:Sacrifice,Bird,Butter,Milk,Egg',
        ];
        if(!is_null($this->logo_path)){
            $data['logo'] = 'mimes:jpeg,jpg,bmp,png|max:20240';
        }
        return $data;
    }

}
