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

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $result = $this->user->changePassword($request->old_password, $request->password);
            if ($result == 'error') {
                return back()->with('flash_error', 'Old Password isn`t Correct');
            } else {
                return back()->with('flash_success', 'Password changed successfully');
            }
        } catch (\Exception $e) {
            return back()->with('flash_error', 'Something went wrong');
        }
    }


    public function showSettingsForm()
    {
        try {
            return  view('admin.settings.settings');
        } catch (\Exception $e) {
            return back()->with('flash_error', 'Something went wrong');
        }
    }

    public function updateSettings(Request $request)
    {
        //   try{
        Setting::set('terms', $request->terms);
        Setting::set('privacy', $request->privacy);
        Setting::set('website_phone', $request->website_phone);
        Setting::save();
        session()->flash('success' , 'تم تعديل الاعدادت بنجاح');
        return back()->with('flash_success', 'Settings Updated successfully');

        // }catch(\Exception $e){
        //     return back()->with('flash_error', 'Something went wrong');
        // }
    }
    public function getPrivacy(){
        $data = Setting::get('privacy');
        return view('admin.settings.privacy' , compact('data') );
    }
    public function getTerms(){
        $data = Setting::get('terms');
        return view('admin.settings.terms' , compact('data') );
    }
}
