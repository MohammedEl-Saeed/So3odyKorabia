<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Hash;

use App\models\Notifications;
trait BasicTrait {


    public function traitIndex($model) {

        return $model->orderBy('id', 'desc')->get();
    }

    public function traitShow($model,$id){

      return  $model->findOrFail($id);
    }

    public function traitDelete($model ,$id){

        return $model->where('id',$id)->delete();
    }

    public function traitUpdateStatus($model ,$status,$id){

        return $model::where('id', $id)->update(['status' =>$status]);
    }

    public function traitupdate($model,$id,$arr){

        foreach($arr as $index=>$value){

            $model::where('id', $id)->update([$index =>$value]);
        }
    }

    function circle_distance($lat1, $lon1, $lat2, $lon2) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

          return ($miles * 1.609344);

      }

      public function addToNotification($to ,$message ,$url){

        $obj = new Notifications;

        $obj->to = $to;
        $obj->message = $message;
        $obj->url = $url;

        $obj->save();
      }


}
