<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Auth::user()->carts;
        return view('frontend.cart_index',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json(['success' => $request->user()->name]);
        $product = Product::find($request->product_id); 
        if($product) {
           if($request->user()->carts()->where('product_id',$product->id)->exists()) {
            return response()->json(['message' => 'Product already exists']);
        }
        $request->user()->carts()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);
        return response()->json(['message' => 'Product added to cart']);
    }
    return response()->json(['message' => 'Product not  found']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $product =  $request->user()->carts()->where('product_id',$id)->update(['quantity' =>$request->quantity]);
        if($product) {
            return response()->json(['message'=> "Cart updated successfully"]);
        }else {
            return response()->json(['message'=> "Cart not foud"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = $request->user()->carts()->where('product_id',$id)->first();
        if($product) {
            $product->delete();
            return response()->json(['message' => 'Remove from cart']);
        }else {
            return response()->json(['message' => 'Nai']);
        }
    }



}
