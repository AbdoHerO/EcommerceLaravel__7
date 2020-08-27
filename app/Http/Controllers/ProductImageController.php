<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImage = ProductImage::all();
        return view('website.backend.productimage.index', compact('productImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('website.backend.productimage.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->image_title, '-');
        // $request->merge(['slug' => $slug]);

        $image = time() . '.' . $request->image_product->extension();
        $request->image_product->move(public_path('images'), $image);
        // $request->merge(['image_product' => $image]);
        // $request->image_product = $image;
        // ProductImage::create($request->all());
        ProductImage::create([
            'image_title' => $request->image_title,
            'image_product' => $image,
            'slug' => $slug,
            'product_id' => $request->product_id,
        ]);
        return redirect('dashboard/productImage')->with('messageAdd', $request->input('image_title') . " été crée avec succés !!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        $product = Product::all();
        return view('website.backend.productimage.update', compact('productImage', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $slug = Str::slug($request->image_title, '-');

        if ($request->hasFile('image_product')) {
            // if ($request->have['image_product']) {
            $image = time() . '.' . $request->image_product->extension();
            $request->image_product->move(public_path('images'), $image);
        } else {
            $image = $productImage->image_product;
        }



        $productImage->update([
            'image_title' => $request->image_title,
            'image_product' => $image,
            'slug' => $slug,
            'product_id' => $request->product_id,
        ]);
        return redirect('dashboard/productImage')->with('messageUpdate', $request->input('image_title') . " été modifier avec succés !!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        $image_title_request = $productImage->image_title;
        $productImage->delete();

        return redirect('dashboard/productImage')->with('messageDelete', $image_title_request . " été suppriméée avec succés !!!");
    }
}
