<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\MyAccount;
use App\RecipeCategory;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $recipecategories = RecipeCategory::all();
        $cart_count = 0;
        $cart_count = Cart::where('user_id', Auth::user()->id)->count();

        $cart = array();
        $carts = Cart::where('user_id', $id)->get();
        foreach ($carts as $key => $product) {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->product->product_name,
                'category' => $product->product->category->category_name,
                'brand' => $product->product->brand->brand_name,
                // 'image' => dd($product->product)
            ];
            $stores = array();
            // dd($product->product->product_links);
            foreach ($product->product->product_links as $index => $links) {
                $stores[$index] = [
                    'price' => $links->product_price,
                    'website' => $links->website->website_name,
                    'website_logo' => $links->website->website_logo,
                    'discount' => $links->product_discount,
                    'unit' => $links->product_unit,
                    'unit_price' => $links->product_unit_price,
                    'updated' => $links->product_updated,
                    'image' => $links->product_image,
                ];

                $max = 0;

                // foreach ($stores as $discounted_store) {
                //     preg_match_all('!\d+!', $discounted_store['discount'], $matches);
                //     // $max =  max(array_column($discounted_store, $discounted_store['discount']));
                //     $max = max(array($max, $matches));
                // }

            }
            $cart[$key]['stores'] = $stores;
        }
        return view('frontEnd.my-account', compact('cart', 'cart_count', 'categories', 'recipecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function show(MyAccount $myAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(MyAccount $myAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyAccount $myAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyAccount $myAccount)
    {
        //
    }
}
