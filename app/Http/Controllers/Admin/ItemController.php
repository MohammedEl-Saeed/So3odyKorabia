<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.items.index', compact('data', 'productId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        $data = $this->optionService->getOptions();
//        foreach ($data as $type=>$options){
//            dd($type);
//        }
        return view('admin.items.insert',compact('data','productId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request);
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
    public function edit($id)
    {
        //
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
}
