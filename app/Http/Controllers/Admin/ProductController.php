<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Product;
use App\Services\ItemService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $service, $itemService, $request;

    public function __construct(Request $request,ProductService $service, ItemService $itemService){
        $this->service = $service;
        $this->itemService = $itemService;
        $this->request = $request;
        if(!in_array($request->type,$this->productTypes)){
            abort(404);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        if($type == 'Sacrifice' || $type == 'Bird') {
            $data = $this->service->index($type);
            return view('admin.products.index', compact('data', 'type'));
        } else{
            $product = $this->service->checkProduct($type);
            $productId = $product->id;
            $data = $this->itemService->index($productId);
            return view('admin.items.index', compact('data', 'productId'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
          return view('admin.products.insert',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       $this->service->store($request);
       return redirect()->route('products.index',$request->type);
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
        return view('admin.products.edit',compact('item'));
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
        return view('admin.products.edit',compact('item'));
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

    public function dashboard(){
        return view('admin.dashboard');
    }
}
