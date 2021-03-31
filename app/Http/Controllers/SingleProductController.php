<?php

namespace App\Http\Controllers;

use App\SingleProduct;
use App\Website;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = SingleProduct::all();
        
        return view('backEnd.single_product.index', compact('websites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Website::all();
        return view('backEnd.single_product.create', compact('websites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $website = SingleProduct::create($request->all());

        return redirect()->route('single-product.index')->with('success', 'Product Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SingleProduct $singleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $websites = Website::all();
        $website = SingleProduct::findOrFail($id);

        return view('backEnd.single_product.edit', compact('website', 'websites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $website = SingleProduct::find($id);
        $website->update($input);
        return redirect()->route('single-product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $website = SingleProduct::findOrFail($id);
        $website->delete();
        return redirect()->route('single-product.index')->with('success', 'Product deleted successfully');
    }
}
