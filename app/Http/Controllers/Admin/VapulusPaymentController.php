<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayWithVapulusRequest;
use App\Models\Order;
use App\Models\Transaction;
use App\models\User;
use App\Services\OrderService;
use Illuminate\Http\Request;

class VapulusPaymentController extends Controller
{
    private $secureHash;
    private $appID;
    private $password;

    public function __construct()
    {
        $this->secureHash = '6fd7d27e34353562626362632d343131';
        $this->appID = '738bdc3e-167e-4afb-aeb9-a3a535c8ac53';
        $this->password = '12345678A';
    }


    public function payForm($orderId)
    {
        $order = $this->getOrder($orderId);
        $amount = $order->total_price;
        return view('payment.card', compact('orderId','amount'));
    }

    //https://repl.it/@islamvapulus/php-http-request-with-hashing
    function generateHash($hashSecret, $postData)
    {
        ksort($postData);
        $message = "";
        $appendAmp = 0;
        foreach ($postData as $key => $value) {
            if (strlen($value) > 0) {
                if ($appendAmp == 0) {
                    $message .= $key . '=' . $value;
                    $appendAmp = 1;
                } else {
                    $message .= '&' . $key . "=" . $value;
                }
            }
        }

        $secret = pack('H*', $hashSecret);
        return hash_hmac('sha256', $message, $secret);
    }

    function HTTPPost($url, array $params)
    {
        $query = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function pay(PayWithVapulusRequest $request)
    {
        try{
            $order = $this->getOrder($request->order_id);
            $user = $order->user;
            $postData = array(
                'sessionId' => $request->sessionId,
                'mobileNumber' => $user->phone,
                'email' => $user->email ?? '',
                'amount' => $order->total_price,
                'firstName' => $user->name,
                'lastName' => $user->name,
                'onAccept' => url(route('vapulusPayment.successCallback', ['order_id' => $request->order_id])),
                'onFail' => url(route('vapulusPayment.failCallback', ['order_id' => $request->order_id]))
            );
            $secureHash = $this->secureHash;
            $postData['hashSecret'] = $this->generateHash($secureHash, $postData);
            $postData['appId'] = $this->appID;
            $postData['password'] = $this->password;
            $url = 'https://api.vapulus.com:1338/app/session/pay';
            $response = $this->HTTPPost($url, $postData);
            $decodedResponse = json_decode($response);
            if ($decodedResponse->statusCode == 200) {
                $htmlBodyContent = $decodedResponse->data->htmlBodyContent;
                return view('payment.test_payment', compact('htmlBodyContent'));
            } else {
                return $response;
            }
        } catch(\Exception $e){
            return back()->with('flash_error', 'Something went wrong');
        }

    }

    public function successCallback($order_id, Request $request)
    {
        if ($this->checkTranscationID($request->transactionId)) {
            $trancaction = new Transaction();
            $order = $this->getOrder($order_id);
            $trancaction->user_id = $order->user_id;
            $trancaction->order_id = $order_id;
            $trancaction->transaction_id = $request->transactionId;
            $trancaction->amount = $order->total_price;
            $trancaction->status = $request->status;
            $trancaction->save();
            $message = 'success payment';
            $orderService = new OrderService();
            $orderService->updatePayment($order_id);
            return view('payment.success_payment', compact('message'));
        }
        $message = 'failed payment';
        return view('payment.fail_payment', compact('message'));
//        dd("success payment method callback " . $order_id);
    }

    public function failCallback($order_id, Request $request)
    {
        if ($this->checkTranscationID($request->transactionId)) {
            $trancaction = new Transaction();
            $order = $this->getOrder($order_id);
            $trancaction->user_id = $order->user_id;
            $trancaction->order_id = $order_id;
            $trancaction->transaction_id = $request->transactionId;
            $trancaction->amount = $order->total_price;
            $trancaction->status = $request->status;
            $trancaction->save();
        }
        $message = 'failed payment';
        return view('payment.fail_payment', compact('message'));
//        dd("fail payment method callback " . $order_id);
    }

    public function checkTranscationID($transcationID)
    {
        $postData = array(
            'transactionId' => $transcationID
        );
        $postData['hashSecret'] = $this->generateHash($this->secureHash, $postData);
        $postData['appId'] = $this->appID;
        $postData['password'] = $this->password;
        $url = 'https://api.vapulus.com:1338/app/transactionInfo';
        $response = $this->HTTPPost($url, $postData);
        $decodedResponse = json_decode($response);
        if ($decodedResponse->statusCode == 200) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrder($orderId){
        return Order::findOrFail($orderId);
    }
}
