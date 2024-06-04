<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{

    public function __construct() {
        $items = Auth::user()->carts;
        foreach($items as $item) 
        {
            if($item->product->qty < $item->quantity) {
                $item->delete();
            }
        }
    }

    //__Index
    public function index() {
        $cartItems = Auth::user()->carts;
        $divisions = Http::get('https://bdapis.com/api/v1.2/divisions')['data'];
        return view('frontend.checkout',compact('divisions','cartItems'));
    }
}
