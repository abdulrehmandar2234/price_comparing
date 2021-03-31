<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductLink;
use App\Website;
use Illuminate\Http\Request;

class ProductLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_links = ProductLink::all();
        return view('backEnd.product_link.index', compact('product_links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $websites = Website::all();
        $products = Product::all();

        return view('backEnd.product_link.create', compact('products', 'websites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        ProductLink::create($input);

        return redirect()->route('product_links.index')->with('success', 'Product Link Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $websites = Website::all();
        $products = Product::all();
        $product_link = ProductLink::findOrFail($id);

        return view('backEnd.product_link.edit', compact('product_link', 'websites', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $product_link = ProductLink::findOrFail($id);

        $product_link->update($input);
        return redirect()->route('product_links.index')->with('success', 'Product Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_link = ProductLink::findOrFail($id);
        // unlink(public_path() . $website->website_logo);
        $product_link->delete();
        return redirect()->route('product_links.index')->with('success', 'Product Link deleted successfully');
    }
}
