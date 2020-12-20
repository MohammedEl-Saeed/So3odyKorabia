<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\Message;
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

class MessageRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new Message();
    }

    /** get all users due to type */
    public function index(){
        return  $this->model->orderBy('type')->get();
    }

    /** add new user in system */
    public function store($request, $parentId){
        $this->model->user_id = Auth::id();
        $this->model->parent_id = $parentId;
        $this->model->text = $request->text;
        $this->model->save();
        return $this->model;
    }

    /** show specific user  */
    public function show($id){
        return  $this->traitShow($this->model ,$id);
    }

    public function delete($id){
        return $this->traitDelete($this->model, $id);
    }


}
