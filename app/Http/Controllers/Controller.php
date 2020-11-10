<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $optionTypes = ['Bagging','Kind','Package','Size','Slicing','Weight','Head','Bowels'];
    protected $productTypes = ['Sacrifice','Bird','Butter','Milk','Egg'];

    public function checkExistingItem($model, $id){
        $item = $model->find($id);
        if(is_null($item)){
            abort(404);
        }
    }
}
