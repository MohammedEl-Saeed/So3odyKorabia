<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\ItemsOption;
use App\Models\Option;
use App\Models\Item;
use App\Models\ItemOption;
use App\models\Service;
use App\models\UserServiceDepartment;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileHelper;
use App\Http\Traits\BasicTrait;
use App\models\User;
use App\models\CopyUser;
use App\models\Department;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlockedMail;
use App\Mail\ApprovedMail;
use Carbon\Carbon;
use DB;
use Auth;

class ItemRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new Item();
    }

    /** get all users due to type */
    public function index($productId){
        return  $this->model->where('product_id',$productId);

    }

    /** add new user in system */
    public function store($request){
        if ($request->hasFile('logo')){
            $logo_path = FileHelper::upload_file('/uploads/items/logos/',$request['logo']);
            $this->model->logo=$logo_path;
        }
        $this->model->name = $request->name;
        $this->model->description = $request->description;
        $this->model->product_id = $request->product_id;
        $this->model->order_quantity = $request->order_quantity;
        $this->model->max_amount = $request->max_amount;
        $this->model->save();
        $this->model->options()->sync($request->options);
//        dd($request->all());
//        dd($request->input('options'));
//        if ($request->input('options')) {
//            foreach ($request->input('options') as $key => $option) {
//                $this->model->options()->attach($option, ['price' => $request->input('option_price')[$key]]);
//            }
//        }
        return $this->model;
    }

    /** show specific user  */
    public function show($id){
        return  $this->traitShow($this->model ,$id);
    }

    /** update user Or when Accepting Update request , new changes will be add to user */
    public function update($request, $id){
        $arr= [];
        if ($request->hasFile('logo')){
            $logo_path = FileHelper::upload_file('/uploads/items/logos/',$request['logo']);
            $arr['logo'] = $logo_path;
        }
        $arr['name'] = $request->name;
        $arr['description'] = $request->description;
        $arr['order_quantity'] = $request->order_quantity;
        $arr['max_amount'] = $request->max_amount;
        $model = $this->traitupdate($this->model , $id ,$arr);
        $this->updateItemOptions($request->options, $id);
//        Item::find($id)->options()->sync($request->options);
        return $model;
    }

    /** get all updates request */
    public function getUpdatesRequest($type){
        return $this->traitIndex($this->model);
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

    public function getOptionsByItemId($itemId)
    {
        $data = ItemsOption::where('item_id', $itemId)->get();
        // get option types related to specific item (distinct)
        $optionTypes = array_unique(Item::find($itemId)->options->pluck('type')->toArray());
        $optionsData = [];
        foreach ($optionTypes as $optionType){
            $options = [];
            $options['title'] = $optionType;
            $options['options'] = null;
            foreach($data as $itemOption){
                $itemOption->name = $itemOption->option->name;
                if($itemOption->option->type == $optionType) {
                    $options['options'][] = $itemOption;
                }
                unset($itemOption->option);
            }
            $optionsData[]= $options;
        }

//        $options = [];
//        foreach ($data as $itemOption){
//            $itemOption->name = $itemOption->option->name;
//            $options[$itemOption->option->type][] = $itemOption;
//            unset($itemOption->option);
////            $options[] = $itemOption;
//        }
//        $data = Item::find($itemId)->options()->withPivot('price');
        return $optionsData;
    }

    public function getOptions(){
        return Option::all();
    }

    public function delete($id){
        return $this->traitDelete($this->model, $id);
    }

    public function changeStatus($status, $itemId){
        return $this->traitUpdateStatus($this->model, $status, $itemId);
    }

    public function updateItemOptions($options, $itemId){
        $newOptionIds = [];
        foreach($options as $option){
            $newOptionIds[] = $option['option_id'];
            $itemOption = ItemsOption::where('item_id',$itemId)->where('option_id',$option['option_id'])->first();
            //update item option if exist and else not exist create new one
            if($itemOption){
                $itemOption->price = $option['price'];
                $itemOption->update();
            } else{
                $itemOption->item_id = $itemId;
                $itemOption->option_id = $option['option_id'];
                $itemOption->price = $option['price'];
                $itemOption->save();
            }
        }
        // delete item options there not return from update item
        ItemsOption::where('item_id',$itemId)->whereNotIn('option_id',$newOptionIds)->delete();
    }
}
