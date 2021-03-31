<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        // dd($categories);
        $products = Product::with('product_links')->get();

        $result = array();
        foreach ($products as $key => $product) {
            //return $product->product_links[0];
            $result[$key] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'category' => $product->category->category_name,
                'brand' => $product->brand->brand_name,
                'image' => isset($product->product_links[0]['product_image']) ? $product->product_links[0]['product_image'] : '',
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
        $response = [
            'status' => true,
            'message' => 'Product List',
            'products' => $result,
        ];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function get_product($id)
    {

        // $product = Product::where('id', $id)->with('product_links')->first();
        $product = ScrapedCategory::where('id', $id)->first();
        $result = array();

        $result = [
            'id' => $product->id,
            'name' => $product->title,
            'category' => $product->category->category_name,
            'brand' => $product->brand,
        ];
        $stores = array();
        foreach ($product['product_links'] as $index => $links) {

            $stores[$index] = [
                'price' => $links->price,
                'website' => $links->website->website_name,
                'website_logo' => $links->website->website_logo,
                'discount' => $links->discount_percentage,
                // 'unit' => $links->product_unit,
                'unit_price' => $links->unit_price,
                'updated' => Carbon::parse($links->last_updated)->diffForHumans(),
                'image' => $links->image,
            ];

        }

        $result['stores'] = $stores;

        $response = [
            'status' => true,
            'message' => 'Product List',
            'products' => $result,
        ];

        return response()->json($response);
    }

    public function categorylist(Request $request)
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function search(Request $request)
    {
        $query = $request->input('product_name');
        $products = Product::where('product_name', 'LIKE', '%' . $query . '%')->get();
        $result = array();
        //  return $products ;
        foreach ($products as $key => $product) {
            $result[$key] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'category' => $product->category->category_name,
                'brand' => $product->brand->brand_name,
                'image' => $product->product_links[0]['product_image'],
            ];
            $stores = array();
            foreach ($product['product_links'] as $index => $links) {

                $stores[$index] = [
                    'price' => $links->product_price,
                    'website' => $links->website->website_name,
                    'website_logo' => $links->website->website_logo,
                    'discount' => $links->product_discount,
                    // 'unit' => $links->product_unit,
                    'unit_price' => $links->product_unit_price,
                    'updated' => $links->product_updated,
                    'image' => $links->product_image,
                ];

                $max = 0;

            }
            $result[$key]['stores'] = $stores;
        }
        $response = [
            'status' => true,
            'message' => 'Specific search products',
            'products' => $result,
        ];
        return response()->json($response);
    }

    public function listStores()
    {
        $id = Auth::guard('api')->user()->id;
        $product_id = Cart::where('user_id', $id)->pluck('product_id');
        $products = Product::whereIn('id', $product_id)->with('product_links')->get();

        $result = array();
        //  return $products ;
        foreach ($products as $key => $product) {
            $result[$key] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'category' => $product->category->category_name,
                'brand' => $product->brand->brand_name,
                'image' => $product->product_links[0]['product_image'],
            ];
            $stores = array();
            foreach ($product['product_links'] as $index => $links) {

                $stores[$index] = [
                    'price' => $links->product_price,
                    'website_logo' => $links->website->website_logo,
                ];

                $max = 0;

            }

            $result[$key]['stores'] = $stores;
        }
        $response = [
            'status' => true,
            'message' => 'Product List',
            'products' => $result,
        ];
        return response()->json($response);
    }
}
