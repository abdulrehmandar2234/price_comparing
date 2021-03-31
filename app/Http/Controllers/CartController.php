<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Collection;
use App\Product;
use App\RecipeCategory;
use App\Slider;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->with('products')->get();
        return view('frontEnd.partials.header', compact('carts'));
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
        // dd($request->all());
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if (Cart::where(['user_id' => $input['user_id'], 'product_id' => $input['product_id']])->exists()) {
            $response = array(
                'status' => 'failed',
                'msg' => 'Product already exists in cart',

            );
            return response()->json($response);
        }

        $cart = Cart::create($input);
        $response = array(
            'status' => 'success',
            'msg' => 'Product added to cart successfully',
            'data' => $cart,
        );
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cart = Cart::where(['product_id' => $id, 'user_id' => Auth::user()->id])->delete();

        $response = array(
            'status' => 'success',
            'msg' => 'Product deleted from cart successfully',
            'data' => $cart,
        );
        return response()->json($response);
    }

    public function view()
    {
        // ! Search
        // $products = Product::with('product_links')->get();
        $collections = Collection::all();
        // ! Index
        // dd($categories);
        $recipecategories = RecipeCategory::all();
        $categories = Category::all();

        $id = Auth::user()->id;
        $product_id = Cart::where('user_id', $id)->pluck('product_id');

        $products = Product::whereIn('id', $product_id)->with('product_links')->get();

        $result = array();
        foreach ($products as $key => $product) {
            $result[$key] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'category' => $product->category->category_name,
                'brand' => $product->brand->brand_name,

            ];
            $stores = array();
            foreach ($product['product_links'] as $index => $links) {

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

                foreach ($stores as $discounted_store) {
                    preg_match_all('!\d+!', $discounted_store['discount'], $matches);
                    // $max =  max(array_column($discounted_store, $discounted_store['discount']));
                    $max = max(array($max, $matches));
                }
            }

            $result[$key]['stores'] = $stores;
        }
        $sum = 0;

        $cart = array();
        $carts = Cart::where('user_id', $id)->get();
        foreach ($carts as $key => $product) {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->product->product_name,
                'category' => $product->product->category->category_name,
                'brand' => $product->product->brand->brand_name,
                'product_id' => $product->product->id,
                // 'image' => dd($product->product)
            ];
            $stores = array();
            // dd($product->product->product_links);
            $sum += floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $product->product->product_links[0]->product_price)));

            // dd($product->product->product_links);
            foreach ($product->product->product_links as $index => $links) {
                $stores[$index] = [
                    'price' => '€' . floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $links->product_price))),
                    'website' => $links->website->website_name,
                    'website_logo' => $links->website->website_logo,
                    'discount' => $links->product_discount,
                    'unit' => $links->product_unit,
                    'unit_price' => $links->product_unit_price,
                    'updated' => $links->product_updated,
                    'image' => $links->product_image,
                ];

            }
            $cart[$key]['stores'] = $stores;

        }

        $wishlists = Wishlist::with('products')->get();

        $sliders = Slider::all();

        $cart_count = 0;
        $cart_count = Cart::where('user_id', Auth::user()->id)->count();

        return view('frontEnd.cart', compact('result', 'products', 'sliders', 'wishlists', 'carts', 'cart', 'cart_count', 'categories', 'recipecategories', 'sum', 'collections'));

    }
}
