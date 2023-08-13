<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('vendor.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('vendor.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {       
        $product = Product::create($request->all());
        if ($request->input('photo', false)) {
            foreach ($request->input('photo') as $photo) {
                $product->addMedia(storage_path('tmp/uploads/' . $photo))
                ->toMediaCollection('photo');
            }
        }
            
        

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }
        return redirect()->route('vendor.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('vendor.products.show', compact('product'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('vendor.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $myImages=[];
       ($request->all());
       
        if ($request->input('photo', false)) {
            foreach($product->images as $image){
                if(in_array($image->file_name,$request->input('photo'))){
                   array_push( $myImages,$image->file_name);
                }
                else{
                    $image->delete();
                }
            }    
            foreach ($request->input('photo') as $photo) {
                if(!in_array($photo,$myImages)){
                    $product->addMedia(storage_path('tmp/uploads/' . $photo))
                    ->toMediaCollection('photo');                 }
                
            }

            
            

        } 
       
       


        return redirect()->route('vendor.products.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->photo->delete();

        $product->delete();

        return back();

    }
}
