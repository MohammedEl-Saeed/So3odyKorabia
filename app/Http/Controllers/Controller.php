<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\SettingsManager;
use App\Models\CartDetail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Setting;
use Tymon\JWTAuth\Facades\JWTAuth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $optionTypes = ['Bagging','Kind','Package','Size','Slicing','Weight','Head','Bowels'];
    protected $productTypes = ['Sacrifice','Bird','Butter','Milk','Egg'];

    public function checkExistingItem($model, $id){
        $item = $model->findOrFail($id);
        return $item;
    }

    public function checkAuth($id){
        $item = $this->service->show($id);
        if(Auth::id() != $item->user_id){
            return false;
       }
       return true;
    }

    public function checkCart(){
        $userId = Auth::id();
        if(is_null($userId)){
            $userId = auth('api')->id();
        }
        if(count(CartDetail::where('user_id',$userId)->get()) > 0){
            return true;
        } else{
            return false;
        }
    }

    public function getSitePhone(){
       $phone = Setting::get('website_phone');
        return $phone;
    }
}
