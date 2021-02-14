<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use Illuminate\Http\Request;
use League\Flysystem\Config;
use Setting;

class SettingController extends Controller
{
    use ResponseTraits;
    public function getTerms(){
        $data = [];
        $data['terms'] = Setting::get('terms');
        $data['privacy'] = Setting::get('privacy');
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }
}
