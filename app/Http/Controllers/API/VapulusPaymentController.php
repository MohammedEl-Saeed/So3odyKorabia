<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePayFormRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VapulusPaymentController extends Controller
{
    public function createPayForm(CreatePayFormRequest $request)
    {
//        $validator = Validator::make($request->all(), [
//            'order_id' => 'required|exists:orders,id'
//        ]);
//        if ($validator->fails()) {
//            return $this->prepare_response(true,$validator->errors(),'Error validation',null,1,200) ;
//        }
        $data = $request->validated();
        $order = Order::find($request->order_id);
        $response = [
            'data' => $order,
            "url" => url(route('vapulusPayment.payFormWithType', $data))
        ];
        return response()->json($response);
    }
}
