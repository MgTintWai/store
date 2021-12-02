<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('img');
        $file_name = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/upload/products/',$file_name);
    
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'categories_id'=>$request->categories_id,
            'img'=>$file_name,
        ]);
        return redirect('product')->with('success',"New Category ( $request->name ) is created successfully !");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Product $product)
    {

        $old_name = $product->name;
        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->img = $request->img;
        $product->categories_id = $request->categories_id;
        $product->save();
        
        return redirect('product')->with('success',"$old_name is successfully updated!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $name = $product->name;
        $product->delete();
        
        return redirect('product')->with('success', "$name Category is delete Success !");
    }
}
