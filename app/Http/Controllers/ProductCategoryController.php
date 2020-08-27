<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategory = ProductCategory::all();
        return view('website.backend.productcategory.index', compact('productcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.productcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug = Str::slug($request->brand_name, '-');
        $request->merge(['slug' => $slug]);

        ProductCategory::create($request->all());
        return redirect('dashboard/productcategory')->with('messageAdd', $request->input('brand_name') . " été crée avec succés !!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productcategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productcategory)
    {
        return view('website.backend.productcategory.update', compact('productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productcategory)
    {
        // $slug = Str::slug($request->brand_name, '-');
        // $request->merge(['slug' => $slug]);
        // $productcategory = ProductCategory::find($productcategory);
        $productcategory->update($request->input());


        // $productcategory->update($request->all());
        return redirect('dashboard/productcategory')->with('messageUpdate', $request->input('brand_name') . " été modifier avec succés !!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productcategory)
    {

        // $productcategory = ProductCategory::find($productcategory);

        $brand_name_request = $productcategory->brand_name;
        $productcategory->delete();

        return redirect('dashboard/productcategory')->with('messageDelete', $brand_name_request . " été suppriméée avec succés !!!");
    }
}
