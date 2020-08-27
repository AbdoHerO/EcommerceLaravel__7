<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $productImage = ProductImage::all();
        return view('website.backend.product.index', compact('product', 'productImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productcategory = ProductCategory::all();
        return view('website.backend.product.create', compact('productcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->product_name, '-');
        $request->merge(['slug' => $slug]);

        Product::create($request->all());
        return redirect('dashboard/product')->with('messageAdd', $request->input('product_name') . " été crée avec succés !!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productcategory = ProductCategory::all();
        return view('website.backend.product.update', compact('product', 'productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $slug = Str::slug($request->product_name, '-');
        $product->update($request->input());


        // $productcategory->update($request->all());
        return redirect('dashboard/product')->with('messageUpdate', $request->input('product_name') . " été modifier avec succés !!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $productcategory = ProductCategory::find($productcategory);

        $product_name_request = $product->product_name;
        $product->delete();

        return redirect('dashboard/product')->with('messageDelete', $product_name_request . " été suppriméée avec succés !!!");
    }
}
