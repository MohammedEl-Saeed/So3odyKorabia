<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VapulusPaymentController extends Controller
{
    private $secureHash;
    private $appID;
    private $password;

    public function __construct()
    {
        $this->secureHash = 'a59f1cc564356264356632392d313539';
        $this->appID = 'cb716c4b-e085-4a8e-83cd-90a3e68a1640';
        $this->password = '123456';
    }


    public function payForm($orderId)
    {
        return view('payment.card', compact('orderId'));
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

    public function pay(Request $request)
    {
        $postData = array(
            'sessionId' => $request->sessionId,
            'mobileNumber' => '01124772675',
            'email' => 'dev.teraninja28@gmail.com',
            'amount' => '15.0',
            'firstName' => 'Mohammed',
            'lastName' => 'El-Saeed',
            'onAccept' => url(route('vapulusPayment.successCallback', ['order_id' => $request->order_id])),
            'onFail' => url(route('vapulusPayment.failCallback', ['order_id' => $request->order_id]))
        );

        $secureHash = '6fd7d27e34353562626362632d343131';
        $postData['hashSecret'] = $this->generateHash($secureHash, $postData);

        $postData['appId'] = '738bdc3e-167e-4afb-aeb9-a3a535c8ac53';
        $postData['password'] = '12345678A';

        $url = 'https://api.vapulus.com:1338/app/session/pay';

        $response = $this->HTTPPost($url, $postData);

        $decodedResponse = json_decode($response);
        if ($decodedResponse->statusCode == 200) {
            $htmlBodyContent = $decodedResponse->data->htmlBodyContent;
            return view('payment.test_payment', compact('htmlBodyContent'));
        } else {
            return $response;
        }

    }

    public function successCallback($order_id)
    {
        $message = 'success payment';
        return view('payment.success_payment', compact('message'));
//        dd("success payment method callback " . $order_id);
    }

    public function failCallback($order_id)
    {
        $message = 'failed payment';
        return view('payment.fail_payment', compact('message'));
//        dd("fail payment method callback " . $order_id);
    }
}
