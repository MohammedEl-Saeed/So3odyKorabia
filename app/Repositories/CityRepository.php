<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\City;
use App\models\Service;
use App\models\UserServiceDepartment;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileHelper;
use App\Http\Traits\BasicTrait;
use App\models\User;
use App\models\Department;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlockedMail;
use App\Mail\ApprovedMail;
use Carbon\Carbon;
use DB;
use Auth;

class CityRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new City();
    }

    /** get all users due to type */
    public function index(){
        return  $this->traitIndex($this->model);
    }

    /** add new user in system */
    public function store($request){
        $this->model->name = $request->name;
        $this->model->availability = $request->availability;
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
        $arr['name'] = $request->name;
        $arr['availability'] = $request->availability;
        return $this->traitupdate($this->model , $id ,$arr);
    }

//    /** change status for  comming model  */
//    public function updateStatus($status ,$id){
//
//        return $this->traitUpdateStatus($this->model ,$status ,$id);
//    }


     /** admin can block user . If admin blocked user , user couldn`t logged in */
    public function blockStatus($blocked_reason =null , $proudct_id){
            $arr['block']=true;
        return $this->traitupdate($this->model, $proudct_id, $arr);
    }

    public function unblockStatus($proudct_id){
        $arr['block']=false;
        return $this->traitupdate($this->model,$proudct_id,$arr);
    }


    public function delete($id){
        return $this->traitDelete($this->model, $id);
    }

    public function getCities(){
        return $this->model::where('availability',1)->get();
    }

}
