<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Services\OptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class OptionController extends Controller
{
    protected $service;
    public function __construct(OptionService $service)
    {
        $this->service = $service;
        $this->types = ['Bagging', 'Kind', 'Package', 'Size', 'Slicing', 'Weight', 'Head', 'Bowels'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->service->index();
        return view('admin.options.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Config::get('constants.OptionTypes');
        return view('admin.options.insert', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        $this->service->store($request);
        session()->flash('success' , 'option has been added successful');
        return redirect('/options');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $types = Config::get('constants.OptionTypes');
        return view('admin.options.edit', compact('item', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, $id)
    {
        $this->service->update($request, $id);
        session()->flash('success' , 'option has been updated successful');
        return redirect('/options');
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
        session()->flash('success' , 'option has been deleted successful');
        return redirect('/options');
    }
}
