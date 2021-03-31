<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

       $input = $request->all();
       $input['user_id'] = Auth::guard('api')->user()->id;

       if (Wishlist::where(['user_id' => $input['user_id'], 'product_id' => $input['product_id']])->exists()) 
       {
           $response = array(
               'status' => 'failed',
               'msg' => 'Product already exists in wishlist',
           );
           return response()->json($response);
       }

       $wishlist = Wishlist::create($input);
     
       $new_cart = Wishlist::where('user_id', $input['user_id'])->pluck('product_id');
       $products = Product::whereIn('id' , $new_cart)->with('product_links')->get();
        
       $result = array();
      //  return $products ;
       foreach ($products as $key => $product) {
           $result[$key] = [
               'id'       => $product->id,
               'name'     => $product->product_name,
               'category' => $product->category->category_name,
               'brand'    => $product->brand->brand_name,
           ];
           $stores = array();
           foreach ($product['product_links'] as $index => $links) {

               $stores[$index] = [
                   'price' => $links->product_price,
                   'website' => $links->website->website_name,
                   'website_logo' => $links->website->website_logo,
                   'discount' =>  $links->product_discount,
                   'unit' =>  $links->product_unit,
                   'unit_price' =>  $links->product_unit_price,
                   'updated' =>  $links->product_updated,
                   'image' =>  $links->product_image
               ];

               $max = 0;

           }
           $result[$key]['stores'] = $stores;
       }
      $response = [
          'status' => true,
          'message' => 'Wishlist added successfully',
         'products' => $result
      ];
      return response()->json($response);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        $product_id = Wishlist::where('user_id' , $id)->pluck('product_id');
        $cart = Wishlist::where('user_id' , $id)->where('product_id' , $request->product_id)->first();
        $cart->delete();
        $new_cart = Wishlist::where('user_id',$id)->pluck('product_id');
        $products = Product::whereIn('id' , $new_cart)->with('product_links')->get();
         
        $result = array();
       //  return $products ;
        foreach ($products as $key => $product) {
            $result[$key] = [
                'id'       => $product->id,
                'name'     => $product->product_name,
                'category' => $product->category->category_name,
                'brand'    => $product->brand->brand_name,
                'image'    => $product->product_links[0]['product_image'],
            ];
            $stores = array();
            foreach ($product['product_links'] as $index => $links) {

                $stores[$index] = [
                    'price' => $links->product_price,
                    'website' => $links->website->website_name,
                    'website_logo' => $links->website->website_logo,
                    'discount' =>  $links->product_discount,
                    'unit' =>  $links->product_unit,
                    'unit_price' =>  $links->product_unit_price,
                    'updated' =>  $links->product_updated,
                    'image' =>  $links->product_image
                ];

                $max = 0;

            }
            $result[$key]['stores'] = $stores;
        }
       $response = [
           'status' => true,
           'message' => 'Product deleted in wishlist successfully',
           'products' => $result
       ];
       return response()->json($response);
    }


    public function specificWishlist()
    {
        $id = Auth::guard('api')->user()->id;
        $product_id = Wishlist::where('user_id' , $id)->pluck('product_id');
        $products = Product::whereIn('id' , $product_id)->with('product_links')->get();
        $result = array();
       //  return $products ;
        foreach ($products as $key => $product) {
            $result[$key] = [
                'id'       => $product->id,
                'name'     => $product->product_name,
                'category' => $product->category->category_name,
                'brand'    => $product->brand->brand_name,
                'image'    => $product->product_links[0]['product_image'],
            ];
            $stores = array();
            foreach ($product['product_links'] as $index => $links) {

                $stores[$index] = [
                    'price' => $links->product_price,
                    'website' => $links->website->website_name,
                    'website_logo' => $links->website->website_logo,
                    'discount' =>  $links->product_discount,
                    'unit' =>  $links->product_unit,
                    'unit_price' =>  $links->product_unit_price,
                    'updated' =>  $links->product_updated,
                    'image' =>  $links->product_image
                ];

                $max = 0;

            }
            $result[$key]['stores'] = $stores;
        }
       $response = [
           'status' => true,
           'message' => 'Specific user wishlist product',
           'products' => $result
       ];
       return response()->json($response);
    }
}
