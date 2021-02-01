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

    public function __construct(Request $request, ProductService $service, ItemService $itemService)
    {
        $this->service = $service;
        $this->itemService = $itemService;
        $this->request = $request;
        //        if(!in_array($request->type,$this->productTypes)){
        //            abort(404);
        //        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        //        dd(Auth::user());
        if ($type == 'Sacrifice' || $type == 'Bird') {
            $data = $this->service->index($type);
            return view('admin.products.index', compact('data', 'type'));
        } else {
            $product = $this->service->checkProduct($type);
            $productId = $product->id;
            $data = $this->itemService->index($productId);
            $productName = Product::findorFail($productId);
            $type = $productName->name;
            return view('admin.items.index', compact('data', 'productId' , 'type'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('admin.products.insert', compact('type'));
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
        session()->flash('success' , 'تم أضافة المنتج بنجاح');
        return redirect()->route('products.index', $request->type);
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
        return view('admin.products.edit', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id)
    {
        $item = $this->service->show($id);
        return view('admin.products.edit', compact('item', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $this->service->update($request, $id);
        session()->flash('success' , 'تم تعديل المنتج بنجاح');
        return redirect()->route('products.index', $request->type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type)
    {
        $this->service->delete($id);
        session()->flash('success' , 'تم حذف المنتج بنجاح');
        return redirect('/products/' . $type);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function makeProductUnavailable($type, $id)
    {
        $this->service->changeStatus('Unavailable', $id);
        return redirect('/products/' . $type);
    }

    public function makeProductAvailable($type, $id)
    {
        $this->service->changeStatus('Available', $id);
        return redirect('/products/' . $type);
    }

    public function makeProductSold($type, $id)
    {
        $this->service->changeStatus('Sold', $id);
        return redirect('/products/' . $type);
    }
}
