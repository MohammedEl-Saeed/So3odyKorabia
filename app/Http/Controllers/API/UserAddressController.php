<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use App\Services\UserAddressService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAddressController extends Controller
{
    use ResponseTraits;
    protected $service;
    public function __construct(UserAddressService $service){
        $this->service = $service;
    }

    public function addAddress(Request $request){
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:areas,id',
            'street' => 'required|string',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->store($request);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }


     public function updateAddress(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:user_addresses,id',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:areas,id',
            'default_address'=>'in:1,0',
            'street' => 'required|string',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->update($request, $request->id);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function getUserAddresses(){
        $data = $this->service->getAddressesForUser();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function removeAddress(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:user_addresses,id',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',null,1,200) ;
        }
        if(!$this->checkAuth($request->id)){
            return $this->prepare_response(true,null,'user not allow to delete this item',null,1,200) ;
        }
        $data = $this->service->delete($request->user_address_id);
        return $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

     public function getAreas($cityId){
        $validator = Validator::make(['city_id'=>$cityId], [
            'city_id' => 'required|exists:cities,id',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',null,1,200) ;
        }
        $data = $this->service->getAreas($cityId);
        return $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

}
