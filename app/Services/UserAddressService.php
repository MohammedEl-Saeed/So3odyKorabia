<?php

namespace App\Services;

use App\Models\UserAddress;
use App\Repositories\UserAddressRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class UserAddressService
{

   use  BasicTrait;
    protected $model ,$userAddress;

    public function __construct()
    {
//        $this->model = $model;
        $this->userAddress = new UserAddressRepository();
    }
    /** get all userAddress by type  */
    public function index(){
        return $this->userAddress->index()->get();
    }

    /** add new userAddress to sysytem */
    public function store($request){
        return $this->userAddress->store($request);
    }

    /** show specific userAddress  */
    public function show($id){
         return $this->userAddress->show($id);
    }

    /** accept updates for userAddress */
    public function update($updated_data, $id){
        return  $this->userAddress->update($updated_data, $id);
    }

    /** block specific userAddress */

    public function blockStatus($userAddress_id){

        return  $this->userAddress->blockStatus( $userAddress_id);

    }

    public function unblockStatus( $userAddress_id){

        return  $this->userAddress->unblockStatus( $userAddress_id);
    }


//    public function getServices(){
//        return $this->userAddress->getServices();
//    }

    /** delete userAddress */
    public function delete($id){
        return $this->userAddress->delete($id);
    }

    public function getAddressesForUser(){
        return $this->userAddress->getAddressesForUser();
    }

}
