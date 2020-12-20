<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotifcationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Setting;
class AdminController extends Controller
{

    protected $user;

    // Constructor to bind model to repo
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /** index function return admin dashboard */

    public function index()
    {
        return view('admin.dashboard');
    }

    public function changePassword(ChangePasswordRequest $request){
        try{
            $result= $this->user->changePassword($request->old_password ,$request->password);
            if($result =='error'){
                return back()->with('flash_error','Old Password isn`t Correct');
            }else{
                return back()->with('flash_success','Password changed successfully');
            }
        }catch(\Exception $e){
            return back()->with('flash_error', 'Something went wrong');
        }
    }


    public function showSettingsForm(){
        try{
            return  view('admin.settings.settings');
         }catch(\Exception $e){
             return back()->with('flash_error', 'Something went wrong');
         }
      }

      public function updateSettings(Request $request){
        //   try{
            Setting::set('terms', $request->terms);
            Setting::set('website_phone', $request->website_phone);
            Setting::save();
            return back()->with('flash_success', 'Settings Updated successfully');

        // }catch(\Exception $e){
        //     return back()->with('flash_error', 'Something went wrong');
        // }
      }

}
