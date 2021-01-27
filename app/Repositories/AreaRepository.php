<?php namespace App\Repositories;

use App\Models\Area;
use App\Helpers\FileHelper;
use Auth;
use App\Http\Traits\ResponseTraits;
use App\Http\Traits\BasicTrait;

class AreaRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Area $area)
    {
        $this->model = $area;
    }

    /** get all areas due to type */
    public function index(){
        return  $this->model;

    }

    /** add new area in system */
    public function store($request){

        $this->model::create($request->all());
          return $this->model;
    }

    /** show specific area  */
    public function show($id){
        return  $this->traitShow($this->model ,$id);
    }

    /** update area Or when Accepting Update request , new changes will be add to area */
    public function update($request, $id){
        $arr= [];
        $arr['name'] = $request->name;
        $arr['delivery_time'] = $request->delivery_time;
        $arr['delivery_cost'] = $request->delivery_cost;
        $arr['city_id'] = $request->city_id;
        $this->traitupdate($this->model , $id ,$arr);
        return $this->traitShow($this->model ,$id);
    }

    public function delete($id){
        return $this->traitDelete($this->model, $id);
    }

    public function getAreasOfSubjects($cityId){
        return $this->model::where('city_id',$cityId)->get();
    }
}
