<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => 'required|min:3',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/',
                'password' => 'required|min:6',
                'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:20240'
            ];
        } elseif($this->method('Field') == 'PUT'){
            return [
                'name' => 'required|min:3',
                'email' => 'required|unique:users,email,'.$this->user,
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone,'.$this->user,
                'password' => 'required|min:6',
                'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:20240'
            ];
        }
    }
}
