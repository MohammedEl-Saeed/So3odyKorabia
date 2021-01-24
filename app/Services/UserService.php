<?php

namespace App\Services;

use App\Helpers\FileHelper;
use App\Helpers\SMSHelper;
use App\Http\Traits\ResponseTraits;
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

   use  BasicTrait, ResponseTraits;
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

    public function resetPassword($request){
        return $this->user->resetPassword($request);
    }

    public function sendCode($request)
    {
        $helper = new FileHelper();
        $code = $helper->generateRandomString(5);
//        dd($code);
        $user = User::where('phone',$request->phone);
        $user->update(['code'=>$code]);
        $user = $user->first();
        $message = new SMSHelper();
        $message->sendMessage('Please verify your account with this code: '.$user->code, $user->phone);
    }

    public function checkCode($request)
    {
        $user = User::where('phone',$request->phone)->where('code',$request->code)->first();
        if(!is_null($user)){
            $user->code_verified = 1;
            $user->save();
            return $user;
        } else{
            return false;
        }
    }

    public function checkVerified($request){
        $user = User::where('phone',$request->phone)->first();
        if (is_null($user)){
            $message = '{"error":["Incorrect Phone no. or Password"]}';
        } else{
            if($user->code_verified == 0){
               $message = '{"error":["you are not verified"]}' ;
            }
            $message = 'success';
        }
        return $message;
    }
}
