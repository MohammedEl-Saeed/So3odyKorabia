<?php

namespace App\Services;

use App\Helpers\FileHelper;
use App\Helpers\SMSHelper;
use App\Models\Message;
use App\Repositories\MessageRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class MessageService
{

   use  BasicTrait;
    protected $model ,$message;

    public function __construct()
    {
//        $this->model = $model;
        $this->message = new MessageRepository();
    }
    /** get all message by type  */
    public function index(){
        return $this->message->index()->with('user')->get();
    }

    /** add new message to sysytem */
    public function store($request){
        return $this->message->store($request);
    }

    /** show specific message  */
    public function show($id){
        return $this->message->show($id);
    }

    /** delete message */
    public function delete($id){
        return $this->message->delete($id);
    }

}
