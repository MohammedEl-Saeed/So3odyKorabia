<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $service;

    public function __construct(OrderService $service){
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
        return view('admin.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->service->show($id);
        return view('admin.orders.edit',compact('item'));
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
        return view('admin.orders.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /** accept new order */
    public function acceptOrder($orderId){
        try{
            $this->service->updateStatus('Accepted',$orderId);
//            event(new NotifcationEvent('you  Updates has been accepted ',url('/analysis/edit/profile'),$updated_id));
//            $this->addToNotification($updated_id,'you updates has been accepted',url('/analysis/edit/profile'));
            return redirect()->route('admin.orders.index')->with('flash_success','Request Acceptted and data changed');
        } catch(\Exception $e){
            return back()->with('flash_error', 'Something went wrong');
        }
    }
}
