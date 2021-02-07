<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\SettingsManager;
use App\Events\BeamsEvent;
use App\Http\Traits\NotificationTrait;
use App\Models\BeamNotification;
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
    use NotificationTrait;
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

    public function sendNotification($user_ids = [], $title = '', $body = '', $notificationType, $data_id, $screenName = null){
        event(new BeamsEvent($this->getUsers($user_ids),
            $this->getNotificationObject($title, $body, $notificationType , $data_id)));
        $this->storeNotifications($user_ids, $title, $body, $notificationType, $data_id);
    }

    public function storeNotifications($user_ids = [], $title = '', $body = '', $notificationType, $data_id, $screenName = null){
        foreach ($user_ids as $user_id) {
            $beam = new BeamNotification();
            $beam->user_id = $user_id;
            $beam->title = $title;
            $beam->body = $body;
            $beam->notificationType = $notificationType;
            $beam->order_id = $data_id;
            $beam->screenName = $screenName;
            $beam->save();
        }
    }

    public function readNotification($beam_notification_id){
        $beam = BeamNotification::find($beam_notification_id);
        $beam->read =1;
        return $beam->update();
    }

}
