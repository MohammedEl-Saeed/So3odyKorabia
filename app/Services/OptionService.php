<?php

namespace App\Services;

use App\Models\Option;
use App\Models\OptionOption;
use App\Repositories\OptionRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class OptionService
{

   use  BasicTrait;
    protected $model ,$option;

    public function __construct()
    {
//        $this->model = $model;
        $this->option = new OptionRepository();
    }
    /** get all option by type  */
    public function index(){
        return $this->option->index();
    }

    /** add new option to sysytem */
    public function store($request){
        return $this->option->store($request);
    }

    /** show specific option  */
    public function show($id){
         return $this->option->show($id);
    }

    /** accept updates for option */
    public function update($updated_data, $id){
        return  $this->option->update($updated_data, $id);
    }

    /** block specific option */

    public function blockStatus($option_id){

        return  $this->option->blockStatus( $option_id);

    }

    public function unblockStatus( $option_id){

        return  $this->option->unblockStatus( $option_id);
    }


//    public function getServices(){
//        return $this->option->getServices();
//    }

    /** delete option */
    public function delete($id){
        return $this->option->delete($id);
    }

    public function getOptionsByOptionId($optionId){
        $data = OptionOption::where('option_id',$optionId)->get()->with('options');
        return $data;
    }

    public function getOptions(){
        $data = $this->option->index();
        $options = [];
        foreach ($data as $item){
            $arr['id'] = $item->id;
            $arr['name'] =  $item->name;
            $options[$item->type][] = $arr;
        }
        return $options;
    }

}
