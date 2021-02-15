<?php

namespace App\Http\Requests;

use App\Utility\PaymenTypes;
use Illuminate\Foundation\Http\FormRequest;

class PayWithVapulusRequest extends FormRequest
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
            "sessionId" => "required|string|min:20",
//            "user_id" => "required|exists:users,id",
            "order_id" => 'required|exists:orders,id',
//            "amount" => "numeric|required_if:type," . PaymenTypes::USERS
        ];
    }
}
