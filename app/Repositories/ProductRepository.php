<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductOption;
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

class ProductRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new Product();
    }

    /** get all users due to type */
    public function index($type){
        return  $this->model->where('type',$type);

    }

    /** add new user in system */
    public function store($request){

        if ($request->hasFile('logo')){
            $logo_path = FileHelper::upload_file('/uploads/products/logos/',$request['logo']);
            $this->model->logo=$logo_path;
        }
        $this->model->name = $request->name;
        $this->model->description = $request->description;
        $this->model->type = $request->type;
        $this->model->save();
//        if ($request->input('options')) {
//            foreach ($request->input('options') as $key => $option) {
//                $this->model->options()->attach($option, ['price' => $request->input('option_price')[$key]]);
//            }
//
//        }
        $product =$this->model;
    //                if($request->type =='birds'){
    //                    $product->kinds()->sync($request->user_services ,false);
    //                  }
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
        $arr['description'] = $request->description;
        $arr['type'] = $request->type;
        if ($request->hasFile('logo')){
            $logo_path = FileHelper::upload_file('/uploads/product/logos/',$request['logo']);
            $arr['logo'] = $logo_path;
        }
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

    public function getOptionByProfuctId($productId)
    {
        $data = ProductOption::where('product_id', $productId)->get()->with('options');
        return $data;
    }

    public function getOptions(){
        return Option::all();
    }

    public function delete($id){
        return $this->traitDelete($this->model, $id);
    }

    public function changeStatus($status, $productId){
        return $this->traitUpdateStatus($this->model, $status, $productId);
    }

}
