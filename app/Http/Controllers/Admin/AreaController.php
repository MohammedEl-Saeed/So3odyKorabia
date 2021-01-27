<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Services\AreaService;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    protected $service;
    public function __construct(AreaService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->service->index();
        return view('admin.areas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all()->pluck('name','id');
//        dd($cities);
        return view('admin.areas.insert',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $this->service->store($request);
        session()->flash('susses','Area has been added successful');
        return redirect('/areas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $item = $this->service->show($id);
//        return view('admin.areas.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->service->show($id);
        $cities = City::all()->pluck('name','id');
        return view('admin.areas.edit',compact('item','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $this->service->update($request, $id);
        session()->flash('susses','Area has been Updated successful');
        return redirect('/areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        session()->flash('susses','Area has been deleted successful');
        return redirect('/areas');
    }

    /**
     * get the listing of resource based on subject from storage.
     *
     * @param  int  $subjectId
     * @return \Illuminate\Http\Response
     */
    public function getAreasOfCitiess($cityId)
    {
        $data = $this->service->getAreasOfSubjects($cityId);
        return response()->json($data);
    }
}
