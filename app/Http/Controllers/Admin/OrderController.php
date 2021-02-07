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
        $done_orders = $this->service->index()->where('status','Done')->get();
        $new_orders = $this->service->index()->where('status','Waiting')->get();
        $today_orders = $this->service->index()->whereDate('created_at','=',date('H-m-d'));
        $all_orders = $this->service->index()->get();
        $accepted_orders = $this->service->index()->where('status','Accepted')->get();
        $rejected_orders = $this->service->index()->where('status','Rejected')->get();
//        $Inprogress_orders = $this->service->index()->where('status','InProgress')->get();
        return view('admin.orders.index', compact('done_orders','new_orders','today_orders','all_orders','accepted_orders','rejected_orders'));
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
        $data = $this->service->show($id);
          dd($data);
        return view('admin.orders.show',compact('data'));
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
            return redirect()->route('orders.index')->with('flash_success','Request Acceptted and data changed');
        } catch(\Exception $e){
            return back()->with('flash_error', 'Something went wrong');
        }
    }

     /** reject new order */
    public function rejectOrder($orderId){
        try{
            $this->service->updateStatus('Rejected',$orderId);
//            event(new NotifcationEvent('you  Updates has been accepted ',url('/analysis/edit/profile'),$updated_id));
//            $this->addToNotification($updated_id,'you updates has been accepted',url('/analysis/edit/profile'));
            return redirect()->route('orders.index')->with('flash_success','Request Acceptted and data changed');
        } catch(\Exception $e){
            return back()->with('flash_error', 'Something went wrong');
        }
    }

  /** done new order */
    public function doneOrder($orderId){
        try{
            $this->service->updateStatus('Done',$orderId);
//            event(new NotifcationEvent('you  Updates has been accepted ',url('/analysis/edit/profile'),$updated_id));
//            $this->addToNotification($updated_id,'you updates has been accepted',url('/analysis/edit/profile'));
            return redirect()->route('orders.index')->with('flash_success','Request Acceptted and data changed');
        } catch(\Exception $e){
            return back()->with('flash_error', 'Something went wrong');
        }
    }

}
