<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()  {
        $categories=Category::limit(4)->get();
        $featured_products=Product::where('trending','1')->where('status','1')->limit(8)->get();
        return view('front.welcome',compact('featured_products','categories'));
        
    }

    public function product_details (Product $product){
        $related_products=Product::where('id','!=',$product->id)->where('trending','1')->where('status','1')->where('category_id',$product->category_id)->limit(4)->get();
        return view('front.product_details',compact('product','related_products'));

    }


    public function shop()
    {
        $categories=Category::all();
        $items=Product::where('status','1')->orderBy('id','ASC');
        $total=count($items->get());
        $items=$items->simplePaginate(6);
        return view('front.shop',compact('items','categories','total'));

    }

    public function category_details (Category $category)  
    {
        $categories=Category::all();
        $items=Product::where('category_id',$category->id)->where('status','1')->orderBy('id','ASC');
        $total=count($items->get());
        $items=$items->simplePaginate(6);
        return view('front.shop',compact('items','categories','total'));
    }

    public function contact()  { 
        return view('front.contact');
    }
    public function refund()  { 
        return view('front.refund');
    }
    public function terms()  { 
        return view('front.terms');
    }
    public function faqs()  { 
        return view('front.faqs');
    }
    public function about()  { 
        return view('front.about');
    }
}
