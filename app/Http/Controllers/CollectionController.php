<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Cart;
use App\Category;
use App\Collection;
use App\CollectionProduct;
use App\Product;
use App\RecipeCategory;
use Auth;
use DB;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id = Auth::user()->id;
        $products = Product::with('product_links')->get();
        $collections = Collection::where('user_id', $id)->with('items')->get();
        // dd($products);
        //
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

                //     $removed_symbol_price = trim(str_replace(['€', '$', '£', 'US$', 'US', ' '], '', $links->product_price), ' ');
                //         $removed_symbol_price = trim($removed_symbol_price, '\0');
                //         $removed_symbol_price = trim($removed_symbol_price, '\t');
                //         $removed_symbol_price = trim($removed_symbol_price, '\n');
                //         $removed_symbol_price = trim($removed_symbol_price, '\x0B');
                //         $removed_symbol_price = trim($removed_symbol_price, '\r');
                //         $removed_symbol_price = trim($removed_symbol_price, ' ');

                //         $removed_symbol_price = preg_replace("/[^0-9,.]/", "", $removed_symbol_price);

                //         $double_price = explode(' ', $removed_symbol_price);

                //    $double_price = str_replace(',', '.', $double_price);
                //    $sum += floatval($double_price);
                //    dd($sum);
                //    dd($links->product_price ,  floatval($links->product_price),$double_price);

            }
            $cart[$key]['stores'] = $stores;
        }
        $cart_count = 0;
        $cart_count = Cart::where('user_id', Auth::user()->id)->count();
        $recipecategories = RecipeCategory::all();
        $categories = Category::all();
        return view('frontEnd.collection', compact('collections', 'cart', 'cart_count', 'recipecategories', 'categories', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        if (Auth::check()) {

            //     $input = $request->all();
            // $input['user_id'] = Auth::user()->id;
            // $input['quantity'] = $request->quantity;
            $collection = Collection::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
            ]);
            // dd($collection);
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            //  dd($cart);
            // foreach ($cart as  $value) {
            //   $collection_poduct = DB::table('collections_products');

            // }

            foreach ($cart as $value) {
                $record = [
                    'collection_id' => $collection->id,
                    'product_id' => $value->product_id,
                    'quantity' => $request->quantity,
                ];
                DB::table('collection_product')->insert($record);
            }
            return redirect()->back()->with('success', 'Collection Added Successfully');
        } else {
            return error();
        }

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

        $id = Auth::user()->id;

        $recipecategories = RecipeCategory::all();
        $categories = Category::all();
        $collections = Collection::where('user_id', $id)->with('items')->first();

        $specific = CollectionProduct::where('collection_id', $collections->items[0]['collection_id'])->pluck('product_id')->toArray();

        $products = Product::whereIn('id', $specific)->get();
        // dd($products);

        $singleblog = Blog::with('recipecategory')->get();
        // $products   = Product::with('product_links')->get();

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
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($carts as $key => $product) {
                $cart[$key] = [
                    'id' => $product->id,
                    'name' => $product->product->product_name,
                    'category' => $product->product->category->category_name,
                    'brand' => $product->product->brand->brand_name,
                    // 'image' => dd($product->product)
                ];
                $stores = array();
                // if ($key > 0) {
                //     # code...
                //     dd();
                //     dd($product->product->product_links[0] ,$product->product->product_links[0] ->product_price , floatval( $product->product->product_links[0] ->product_price));
                // }

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
                //
                $cart[$key]['stores'] = $stores;

            }
            $Collection = Collection::findOrFail($id);

            $cart_count = 0;
            $cart_count = Cart::where('user_id', Auth::user()->id)->count();

            //   dd($sum);
            return view('frontEnd.editUserCollection', compact('Collection', 'result', 'carts', 'cart', 'cart_count', 'categories', 'recipecategories', 'singleblog', 'sum', 'collections'));

        }

        return view('frontEnd.editUserCollection', compact('Collection', 'result', 'carts', 'cart', 'categories', 'recipecategories', 'singleblog', 'sum', 'collections'));

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
        $collection = Collection::find($id);
        $collection->update($input);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Collection = Collection::findOrFail($id);
        $Collection->delete();
        return redirect()->back()->with('success', 'Collection deleted successfully');
    }

    public function showSpecificCollection($id)
    {
        $id = Auth::user()->id;

        $recipecategories = RecipeCategory::all();
        $categories = Category::all();
        $collections = Collection::where('user_id', $id)->with('items')->first();

        $specific = CollectionProduct::where('collection_id', $collections->items[0]['collection_id'])->pluck('product_id')->toArray();

        $products = Product::whereIn('id', $specific)->get();
        // dd($products);

        $singleblog = Blog::with('recipecategory')->get();
        // $products   = Product::with('product_links')->get();

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
        $carts = Cart::all();
        foreach ($carts as $key => $product) {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->product->product_name,
                'category' => $product->product->category->category_name,
                'brand' => $product->product->brand->brand_name,
                // 'image' => dd($product->product)
            ];
            $stores = array();
            // if ($key > 0) {
            //     # code...
            //     dd();
            //     dd($product->product->product_links[0] ,$product->product->product_links[0] ->product_price , floatval( $product->product->product_links[0] ->product_price));
            // }

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
            //
            $cart[$key]['stores'] = $stores;

        }

        if (Auth::check()) {
            $cart_count = 0;
            $cart_count = Cart::where('user_id', Auth::user()->id)->count();

            //   dd($sum);
            return view('frontEnd.specific-usercollection', compact('result', 'carts', 'cart', 'cart_count', 'categories', 'recipecategories', 'singleblog', 'sum', 'collections'));
        }

        return view('frontEnd.specific-usercollection', compact('result', 'carts', 'cart', 'categories', 'recipecategories', 'singleblog', 'sum', 'collections'));

    }

}
