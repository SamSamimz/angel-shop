<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $trending_products = Product::where('trending',1)->take(10)->get();
        $trending_categories = Category::where('popular',1)->take(10)->get();
        return view('frontend.home',compact('trending_products','trending_categories'));
    }
    
    public function categories() {
        $categories = Category::query()->get();
        return view('frontend.categories',compact('categories'));
    }

    public function categoryProducts($slug) {
        if(Category::where('slug',$slug)->exists()) {
            $category = Category::where('slug',$slug)->first();
            return view('frontend.product_index',compact('category'));
        }else{
            abort(404);
        }
    }

    public function showProduct($cat_slug,$prod_slug) {
        $category = Category::where('slug',$cat_slug)->first();
        $product = Product::where('slug',$prod_slug)->first();
        if($category && $product && $category->products->contains($product)) {
            return view('frontend.show_product',compact('product'));
        };
        abort(404);
    }

}
