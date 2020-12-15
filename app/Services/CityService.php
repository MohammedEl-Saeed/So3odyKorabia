<?php

namespace App\Services;

use App\Models\City;
use App\Models\CityCity;
use App\Repositories\CityRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class CityService
{

   use  BasicTrait;
    protected $model ,$city;

    public function __construct()
    {
//        $this->model = $model;
        $this->city = new CityRepository();
    }
    /** get all city by type  */
    public function index(){
        return $this->city->index();
    }

    /** add new city to sysytem */
    public function store($request){
        return $this->city->store($request);
    }

    /** show specific city  */
    public function show($id){
         return $this->city->show($id);
    }

    /** accept updates for city */
    public function update($updated_data, $id){
        return  $this->city->update($updated_data, $id);
    }

    /** block specific city */

    public function blockStatus($city_id){

        return  $this->city->blockStatus( $city_id);

    }

    public function unblockStatus( $city_id){

        return  $this->city->unblockStatus( $city_id);
    }


//    public function getServices(){
//        return $this->city->getServices();
//    }

    /** delete city */
    public function delete(){
        return $this->city->delete();
    }

}
