<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductPutRequest;
use App\Http\Requests\ProductPostRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.products.create_products', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPostRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['status'] = $request->status ? 1 : 0;
        $data['trending'] = $request->trending ? 1 : 0;
        if($request->hasFile('image')) {
            $path = 'product_'.time().'_img.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('products',$path,'public');
            $data['image'] = $path;
        }
        Product::create($data);
        $this->success('Product added successfully ');
        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        $categories = Category::query()->get();
        return view('admin.products.edit_products',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductPutRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['status'] = $request->status ? 1 : 0;
        $data['trending'] = $request->trending ? 1 : 0;
        if($request->hasFile('image')) {
            if($product->image && file_exists(public_path('storage/products/'.$product->image))) {
                unlink(public_path('storage/products/'.$product->image));
            }
            $path = 'product_'.time().'_img.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('products',$path,'public');
            $data['image'] = $path;
        }
        $product->update($data);
        $this->success('Product updated successfully ');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if(file_exists(public_path('storage/products/'.$product->image))) {
            unlink(public_path('storage/products/'.$product->image));
        }
        $this->success('Product deleted successfully');
        return redirect()->route('products.index');
    }

    protected function success($text) {
        flash()
        ->options([
            'timeout' => 2000,
            'position' => 'bottom-right',
        ])->success($text);
    }


}
