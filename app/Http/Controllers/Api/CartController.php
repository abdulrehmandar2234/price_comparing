<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use Validator;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function storeCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            // 'user_id' => 'required',
            'quantity' => 'required',
         
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

       $input = $request->all();
       $input['user_id'] = Auth::guard('api')->user()->id;

       if (Cart::where(['user_id' => $input['user_id'], 'product_id' => $input['product_id']])->exists()) 
       {
           $response = array(
               'status' => 'failed',
               'msg' => 'Product already exists in cart',
           );
           return response()->json($response);
       }

       $carts = Cart::create($input);
        

       $new_cart = Cart::where('user_id', Auth::guard('api')->user()->id)->pluck('product_id');
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
               'quantity' => Cart::where(['product_id' => $product->id, 'user_id' => Auth::guard('api')->user()->id])->first()->quantity,
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
          'message' => 'Product added to cart successfully',
         'products' => $result
      ];
      return response()->json($response);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'product_id' => 'required',
            'quantity' => 'required',
         
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $id = Auth::guard('api')->user()->id;
        $cart = Cart::where('user_id' , $id)->where('product_id' , $request->product_id)->first();
        $cart->user_id = $id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        $new_cart = Cart::where('user_id',$id)->pluck('product_id');
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
                'quantity' => Cart::where(['product_id' => $product->id, 'user_id' => Auth::guard('api')->user()->id])->first()->quantity,
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
           'message' => 'Quantity updated successfully',
          'products' => $result
       ];
       return response()->json($response);

    }

    public function destroy(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        $product_id = Cart::where('user_id' , $id)->pluck('product_id');
        $cart = Cart::where('user_id' , $id)->where('product_id' , $request->product_id)->first();
        $cart->delete();
        $new_cart = Cart::where('user_id',$id)->pluck('product_id');
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
                'quantity' => Cart::where(['product_id' => $product->id, 'user_id' => Auth::guard('api')->user()->id])->first()->quantity,
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
           'message' => 'Product deleted from cart successfully',
           'products' => $result
       ];
       return response()->json($response);
       
    }

    public function specificUserCart()
    {
        $id = Auth::guard('api')->user()->id;
        $product_id = Cart::where('user_id' , $id)->pluck('product_id');
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
                'quantity' => Cart::where(['product_id' => $product->id, 'user_id' => Auth::guard('api')->user()->id])->first()->quantity,
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
           'message' => 'Specific user cart product',
           'products' => $result
       ];
       return response()->json($response);
    }
}