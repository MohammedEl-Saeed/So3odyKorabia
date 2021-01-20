<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePayFormRequest;
use App\Models\Order;
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

}
