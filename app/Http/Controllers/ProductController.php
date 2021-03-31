<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Cart;
use App\Category;
use App\Product;
use App\Website;
use App\Wishlist;
use App\SingleProduct;
use App\CrawlerWebsite;
use Illuminate\Http\Request;
use App\Http\Controllers\RequestController;
use App\ProductLink;

class ProductController extends Controller
{
    //
    public function best_promotion(Request $request)
    {
        $websites = Website::all();

        $website_logo =  $websites[0]['website_logo'];
        $wishlists = Wishlist::all();
        $carts = Cart::all();
        $cart_count = 0;
        $cart_count = Cart::count();

        $wishlists = $wishlists->toArray();
        $req = new RequestController();

        $result = array();
        $key = 0;
        foreach ($websites as $web) {
            $result[] = $req->get_products($web['website_url'], $web['product_name_node'], $web['product_unit_price_node'], $web['product_price_node'], $web['product_image_node'], $web['product_description_node'], $web['product_discount_node'], $web['product_link_node']);
        }



        $products = array();
        $discounted = array();
        foreach ($result as $l => $res) {
            foreach ($res as $pro) {
                $pro['logo'] = $websites[$l]['website_logo'];
                if ($pro['discount'] != "")
                    $discounted[$key++] = $pro;
                $products[$key++] = $pro;
            }
        }

        $discounted =  $this->price_filter($discounted);

        return view('frontEnd.best-promotion', compact('wishlists', 'cart_count', 'discounted', 'carts', 'carts'));
    }

    public function single_product(Request $request)
    {
        $single_product = SingleProduct::all();
        $req = new RequestController();
        foreach ($single_product as $web) {
            $products[] = $req->get_products_links($web->product_url_node, $web->product_name_node, $web->product_unit_price_node, $web->product_price_node, $web->product_image_node, $web->product_description_node, $web->product_discount_node);
        }
        return view('frontEnd.index', compact('products'));
    }
    public function price_filter($products)
    {
        $products = array_unique($products, SORT_REGULAR);

        $temp_products = [];
        foreach ($products as $key => $g) {

            $temp_products[$key] = $g;
            $removed_symbol_price = trim(str_replace(['€', '$', '£', 'US$', 'US', ' '], '', $g['price']), ' ');
            $removed_symbol_price = trim($removed_symbol_price, '\0');
            $removed_symbol_price = trim($removed_symbol_price, '\t');
            $removed_symbol_price = trim($removed_symbol_price, '\n');
            $removed_symbol_price = trim($removed_symbol_price, '\x0B');
            $removed_symbol_price = trim($removed_symbol_price, '\r');
            $removed_symbol_price = trim($removed_symbol_price, ' ');

            $removed_symbol_price = preg_replace("/[^0-9,.]/", "", $removed_symbol_price);
            $removed_comma_price = trim(str_replace(',', '.', trim($removed_symbol_price)));
            $temp_products[$key]['price'] = $removed_comma_price;
        }
        return $temp_products;
    }



    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    
        $products = Product::all();
       
        return view('backEnd.product.index', compact('products'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('backEnd.product.create', compact('products','brands','categories'));
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
        Product::create($input);
        return redirect()->route('products.index')->with('success', 'Product Added successfully');
    }
 
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('backEnd.product.edit',  compact('product','brands','categories'));
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
        $product =Product::findOrFail($id);
        $product->update($input);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::findOrFail($id);
        // unlink(public_path() . $website->website_logo);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

}
