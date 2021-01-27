<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Option;
use App\Models\Product;
use App\Services\ItemService;
use App\Services\OptionService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $service, $productService, $product, $optionService, $request;

    public function __construct(Request $request, ItemService $service, OptionService $optionService,ProductService $productService, Product $product){
        $this->service = $service;
        $this->productService = $productService;
        $this->product = $product;
        $this->optionService = $optionService;
        //this part of code to check if productId refer to existing product or not
        $this->checkExistingItem($this->product, $request->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $data = $this->service->index($productId);
        $product = Product::findorFail($productId);
        $type = $product->name;
        return view('admin.items.index', compact('data', 'productId' , 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        $data = $this->optionService->getOptions();
        $product = Product::findorFail($productId);
        $type = $product->type;
        return view('admin.items.insert',compact('data','productId' , 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $this->service->store($request);
        session()->flash('success' , 'item has been added successful');
        return redirect()->route('items.index',$request->product_id);
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
    public function edit($productId, $id)
    {
        $item = $this->service->show($id);
        if($productId != $item->product_id){
            abort(404);
        }
        $data = $this->optionService->getOptions();
        return view('admin.items.edit',compact('item','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $this->service->update($request, $id);
        session()->flash('success' , 'item has been updated successful');
        return redirect()->route('items.index',$request->product_id);
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
        session()->flash('success' , 'item has been deleted successful');
        return redirect('/items'.$id);
    }

    public function makeProductUnavailable($productId, $id)
    {
        $this->service->changeStatus('Unavailable',$id);
        return redirect("$productId/items/");
    }

    public function makeProductAvailable($productId, $id)
    {
        $this->service->changeStatus('Available',$id);
        return redirect("$productId/items/");
    }

    public function makeProductSold($productId, $id)
    {
        $this->service->changeStatus('Sold',$id);
        return redirect("$productId/items/");
    }

}
