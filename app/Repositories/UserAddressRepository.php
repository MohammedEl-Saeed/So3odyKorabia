<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\Option;
use App\Models\UserAddress;
use App\models\Service;
use App\models\UserServiceDepartment;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileHelper;
use App\Http\Traits\BasicTrait;
use App\models\User;
use App\models\CopyUser;
use App\models\Department;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlockedMail;
use App\Mail\ApprovedMail;
use Carbon\Carbon;
use DB;
use Auth;

class UserAddressRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new UserAddress();
    }

    /** get all users due to type */
    public function index(){
        return  $this->model;

    }

    /** add new user in system */
    public function store($request){

        $this->model->user_id = Auth::id();
        $this->model->city_id = $request->city_id;
        $this->model->district = $request->district;
        $this->model->street = $request->street;
        $this->model->building_number = $request->building_number;
        $this->model->floor = $request->floor;
        $this->model->type = $request->type;
        $this->model->apartment_number = $request->apartment_number;
        $this->model->address_latitude = $request->address_latitude;
        $this->model->address_longitude = $request->address_longitude;
        $this->model->note = $request->note;
        $this->updateDefaultAddress();
//        $this->model->default_address = $request->default_address;
        $this->model->save();

        return $this->model;
    }

    /** show specific user  */
    public function show($id){
        return  $this->traitShow($this->model ,$id);
    }

    /** update user Or when Accepting Update request , new changes will be add to user */
    public function update($request, $id){
        $arr= [];
        $arr['city_id'] = $request->city_id;
        $arr['district'] = $request->district;
        $arr['street'] = $request->street;
        $arr['building_number'] = $request->building_number;
        $arr['floor'] = $request->floor;
        $arr['type'] = $request->type;
        $arr['apartment_number'] = $request->apartment_number;
        $arr['address_latitude'] = $request->address_latitude;
        $arr['address_longitude'] = $request->address_longitude;
        $arr['note'] = $request->note;
        if($request->default_address){
            $arr['default_address'] = $request->default_address;
            $this->updateDefaultAddress();
        }
        return $this->traitupdate($this->model , $id ,$arr);
    }

    public function delete($id){
        return $this->traitDelete($this->model, $id);
    }

    public function getAddressesForUser(){
        return $this->model::where('user_id',Auth::id())->get();
    }

    public function updateDefaultAddress(){
       return UserAddress::where('user_id',Auth::id())->update(['default_address'=>0]);
    }
}
