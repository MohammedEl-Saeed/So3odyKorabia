<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class UserService
{

   use  BasicTrait;
    protected $model ,$user;

    public function __construct()
    {
//        $this->model = $model;
        $this->user = new UserRepository();
    }
    /** get all user by type  */
    public function index(){
        return $this->user->index()->get();
    }

    /** add new user to sysytem */
    public function store($request){
        return $this->user->store($request);
    }

    /** show specific user  */
    public function show($id){
         return $this->user->show($id);
    }

    /** accept updates for user */
    public function update($request, $id){
        return  $this->user->update($request, $id);
    }

    /** block specific user */

    public function blockStatus($user_id){

        return  $this->user->blockStatus( $user_id);

    }

    public function unblockStatus( $user_id){

        return  $this->user->unblockStatus( $user_id);
    }


//    public function getServices(){
//        return $this->user->getServices();
//    }

    /** delete user */
    public function delete($id){
        return $this->user->delete($id);
    }

}
