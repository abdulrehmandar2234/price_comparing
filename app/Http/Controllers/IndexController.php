<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Cart;
use App\Category;
use App\Collection;
use App\Product;
use App\RecipeCategory;
use App\ScrapedCategory;
use App\Slider;
use App\Website;
use App\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $scraped_categories = ScrapedCategory::take(50)->get();

        $wishlists = Wishlist::with('products')->get();
        $sliders = Slider::all();
        $recipecategories = RecipeCategory::all();
        $categories = Category::all();
        $singleblog = Blog::with('recipecategory')->get();
        $sum = 0;
        $cart = array();
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            $cart_count = 0;
            $cart_count = Cart::where('user_id', Auth::user()->id)->count();
            $collections = Collection::where('user_id', auth()->id())->with('items')->get();

            foreach ($carts as $key => $product) {
                $cart[$key] = [
                    'id' => $product->id,
                    'name' => $product->scrape_category->title,
                    'category' => $product->scrape_category->category->category_name,
                    'brand' => $product->scrape_category->brand,
                    'product_id' => $product->scrape_category->id,
                ];
                $stores = array();

                if (isset($product->scrape_category->price)) {
                    $sum += floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $product->scrape_category->price)));
                }

// dd($product->product->product_links);
                foreach ($product->scrape_category as $index => $links) {
                    $stores[$index] = [
                        'price' => '€' . floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $links->price))),
                        'website' => $links->website->website_name,
                        'website_logo' => $links->website->website_logo,
                        'discount' => $links->discount,
                        'unit_price' => $links->unit_price,
                        'updated' => $links->last_updated,
                        'image' => $links->image,
                    ];

                }
//
                $cart[$key]['stores'] = $stores;

            }
            return view('index', compact('scraped_categories', 'cart_count', 'cart', 'sum', 'wishlists', 'sliders', 'collections', 'categories'));
        }

        return view('index', compact('scraped_categories', 'wishlists', 'sliders', 'categories'));

    }

    public function get_product_details($id)
    {

// $product = Product::where('id', $id)->with('product_links')->first();
        $product = ScrapedCategory::where('id', $id)->first();

        $product_title = $product->title;
        $result = [
            'id' => $product->id,
            'name' => $product->title,
            'category' => $product->category->category_name,
            'brand' => $product->brand,
        ];

        // $compare_products = ScrapedCategory::where(['category_id' => $product->category_id, 'brand' => $product->brand])->where('website_id', '!=', $product->website_id)->get();
        $compare_products = ScrapedCategory::all();

        // $products_titles = $compare_products[0]['title'];
        $match_title = array();

        $websites = Website::where('id', '!=', $product->website_id)->get();
        // $websites = Website::all();

        $comparison = [];
        $stores = [];
        foreach ($websites as $web) {
            $matched_product = '';
            foreach ($web->scrap_category as $other_product) {
                $matched_product = $other_product;
                similar_text($product_title, $other_product['title'], $percent);
                // dd($product_title, $product['title'], $percent);
                // if ($percent > 80) {
                $prev_percent = $percent;
                if ($prev_percent > $percent) {
                    $matched_product = $other_product;
                }
                // if($matched_product)
                // return $product;
                // $match_title = $title;
                // }
            }

            if (sizeof($web->scrap_category) > 0) {

                $stores[] = [
                    'price' => $this->parse_price($matched_product->price),
                    'website' => $matched_product->website->website_name,
                    'website_logo' => $matched_product->website->website_logo,
                    'discount' => $matched_product->discount_percentage,
                    // 'unit' => $links->product_unit,
                    'unit_price' => $matched_product->unit_price,
                    'updated' => Carbon::parse($matched_product->last_updated)->diffForHumans(),
                    'image' => $matched_product->image,
                ];
            } else {
                $stores[] = [
                    'price' => 0,
                    'website' => $web->website_name,
                    'website_logo' => $web->website_logo,
                    'discount' => 0,
                    // 'unit' => $links->product_unit,
                    'unit_price' => 0,
                    'updated' => 0,
                    'image' => "",
                ];
            }

        }

        // Array Sort
        $keys = array_column($stores, 'price');
        array_multisort($keys, SORT_DESC, $stores);
        // End

        $searched_product[0] = [
            'price' => $this->parse_price($product->price),
            'website' => $product->website->website_name,
            'website_logo' => $product->website->website_logo,
            'discount' => $product->discount_percentage,
            // 'unit' => $links->product_unit,
            'unit_price' => $product->unit_price,
            'updated' => Carbon::parse($product->last_updated)->diffForHumans(),
            'image' => $product->image,
        ];
        $stores = array_merge($searched_product, $stores);
        // return
        $result['stores'] = $stores;

        return $result;

        // $result = array();

        // $result = [
        //     'id' => $product->id,
        //     'name' => $product->title,
        //     'category' => $product->category->category_name,
        //     'brand' => $product->brand,
        // ];
        // $stores = array();

        // $stores[0] = [
        //     'price' => $product->price,
        //     'website' => $product->website->website_name,
        //     'website_logo' => $product->website->website_logo,
        //     'discount' => $product->discount_percentage,
        //     // 'unit' => $links->product_unit,
        //     'unit_price' => $product->unit_price,
        //     'updated' => Carbon::parse($product->last_updated)->diffForHumans(),
        //     'image' => $product->image,
        // ];

//ScrapedCategory::where()

// foreach ($product as $link) {
        // return $link;
        // $stores[] = [
        // 'price' => $links->price,
        // 'website' => $links->website->website_name,
        // 'website_logo' => $links->website->website_logo,
        // 'discount' => $links->discount_percentage,
        // // 'unit' => $links->product_unit,
        // 'unit_price' => $links->unit_price,
        // 'updated' => Carbon::parse($links->last_updated)->diffForHumans(),
        // 'image' => $links->image,
        // ];

// }

        $result['stores'] = $stores;

        return response()->json($result);
    }

    public function string_similarity($products, $product_name)
    {

        $result = array();
        $single_products_array = array();
        $same[] = array();
        $index = 0;

        foreach ($products as $key => $p) {
            $p['percent'] = $same[$index++] = similar_text($p['name'], $product_name, $percent);
            $single_products_array[$index++] = $p;
            $array = collect($single_products_array)->sortBy('percent')->reverse()->toArray();
        }

        return $array;
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

    public function singlecategory($id)
    {

        $singleblog = Blog::where('category_id', $id)->orderBy('id', 'DESC')->get();
        $collections = Collection::all();
        $categories = Category::all();
        $recipecategories = RecipeCategory::all();

// dd($categories);
        $products = Product::with('product_links')->get();

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
// $max = max(array_column($discounted_store, $discounted_store['discount']));
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
                'product_id' => $product->product->id,
// 'image' => dd($product->product)
            ];
            $stores = array();
// dd($product->product->product_links);
            if (isset($product->product->product_links[0]->product_price)) {
                $sum += floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $product->product->product_links[0]->product_price)));

            }

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

        if (Auth::check()) {
            $cart_count = 0;
            $cart_count = Cart::where('user_id', Auth::user()->id)->count();
            return view('blogs.allsperecipe', compact('singleblog', 'categories', 'recipecategories', 'cart_count', 'cart', 'sum', 'collections'));
        }
// dd($singleblog);
        return view('blogs.allsperecipe', compact('singleblog', 'categories', 'recipecategories', 'cart', 'sum', 'collections'));
    }
    public function check()
    {

        $scraped_categories = ScrapedCategory::all();
        $wishlists = Wishlist::with('products')->get();
        $sliders = Slider::all();
        $recipecategories = RecipeCategory::all();
        $categories = Category::all();
        $singleblog = Blog::with('recipecategory')->get();
        $sum = 0;
        $cart = array();
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            $cart_count = 0;
            $cart_count = Cart::where('user_id', Auth::user()->id)->count();
            $collections = Collection::where('user_id', auth()->id())->with('items')->get();

            foreach ($carts as $key => $product) {
                $cart[$key] = [
                    'id' => $product->id,
                    'name' => $product->scrape_category->title,
                    'category' => $product->scrape_category->category->category_name,
                    'brand' => $product->scrape_category->brand,
                    'product_id' => $product->scrape_category->id,
                ];
                $stores = array();

                if (isset($product->scrape_category->price)) {
                    $sum += floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $product->scrape_category->price)));
                }

// dd($product->product->product_links);
                foreach ($product->scrape_category as $index => $links) {
                    $stores[$index] = [
                        'price' => '€' . floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $links->price))),
                        'website' => $links->website->website_name,
                        'website_logo' => $links->website->website_logo,
                        'discount' => $links->discount,
                        'unit_price' => $links->unit_price,
                        'updated' => $links->last_updated,
                        'image' => $links->image,
                    ];

                }
//
                $cart[$key]['stores'] = $stores;

            }
            return view('index', compact('scraped_categories', 'cart_count', 'cart', 'sum', 'wishlists', 'sliders', 'collections', 'categories'));
        }

        return view('index', compact('scraped_categories', 'wishlists', 'sliders', 'categories'));

// $id = (Auth::user()->id ?? "");
        // $recipecategories = RecipeCategory::all();
        // $categories = Category::all();
        // $collections = Collection::where('user_id', $id)->with('items')->get();

// $singleblog = Blog::with('recipecategory')->get();
        // $products = Product::with('product_links')->take(38)->latest()->get();

// $result = array();
        // foreach ($products as $key => $product) {
        // $result[$key] = [
        // 'id' => $product->id,
        // 'name' => $product->product_name,
        // 'category' => $product->category->category_name,
        // 'brand' => $product->brand->brand_name,
        // ];
        // $stores = array();
        // foreach ($product['product_links'] as $index => $links) {

// $stores[$index] = [
        // 'price' => $links->product_price,
        // 'website' => $links->website->website_name,
        // 'website_logo' => $links->website->website_logo,
        // 'discount' => $links->product_discount,
        // 'unit' => $links->product_unit,
        // 'unit_price' => $links->product_unit_price,
        // 'updated' => $links->product_updated,
        // 'image' => $links->product_image,
        // ];

// $max = 0;

// foreach ($stores as $discounted_store) {
        // preg_match_all('!\d+!', $discounted_store['discount'], $matches);
        // // $max = max(array_column($discounted_store, $discounted_store['discount']));
        // $max = max(array($max, $matches));
        // }
        // }

// $result[$key]['stores'] = $stores;
        // }
        // $sum = 0;

// $cart = array();
        // if (Auth::check()) {
        // # code...
        // $carts = Cart::where('user_id', Auth::user()->id)->get();
        // foreach ($carts as $key => $product) {
        // $cart[$key] = [
        // 'id' => $product->id,
        // 'name' => $product->product->product_name,
        // 'category' => $product->product->category->category_name,
        // 'brand' => $product->product->brand->brand_name,
        // 'product_id' => $product->product->id,
        // // 'image' => dd($product->product)
        // ];
        // $stores = array();
        // // if ($key > 0) {
        // // # code...
        // // dd();
        // // dd($product->product->product_links[0] ,$product->product->product_links[0] ->product_price , floatval( $product->product->product_links[0] ->product_price));
        // // }
        // if (isset($product->product->product_links[0]->product_price)) {
        // $sum += floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $product->product->product_links[0]->product_price)));
        // }

// // dd($product->product->product_links);
        // foreach ($product->product->product_links as $index => $links) {
        // $stores[$index] = [
        // 'price' => '€' . floatval(preg_replace("/[^-0-9\.]/", "", str_replace(',', '.', $links->product_price))),
        // 'website' => $links->website->website_name,
        // 'website_logo' => $links->website->website_logo,
        // 'discount' => $links->product_discount,
        // 'unit' => $links->product_unit,
        // 'unit_price' => $links->product_unit_price,
        // 'updated' => $links->product_updated,
        // 'image' => $links->product_image,
        // ];

// }
        // //
        // $cart[$key]['stores'] = $stores;

// }

// $wishlists = Wishlist::with('products')->get();
        // $sliders = Slider::all();

// $cart_count = 0;
        // $cart_count = Cart::where('user_id', Auth::user()->id)->count();

// // dd($collections[0]);
        // return view('index2', compact('result', 'sliders', 'wishlists', 'carts', 'cart', 'cart_count', 'categories', 'recipecategories', 'singleblog', 'sum', 'collections'));

// }

// $sliders = Slider::all();
        // return view('index2', compact('result', 'sliders', 'cart', 'categories', 'recipecategories', 'singleblog', 'sum', 'collections'));

    }

    public function parse_price($p)
    {
        $removed_symbol_price = trim(str_replace(['€', '$', '£', 'US$', 'US', ' '], '', $p), ' ');
        $removed_symbol_price = trim($removed_symbol_price, '\0');
        $removed_symbol_price = trim($removed_symbol_price, '\t');
        $removed_symbol_price = trim($removed_symbol_price, '\n');
        $removed_symbol_price = trim($removed_symbol_price, '\x0B');
        $removed_symbol_price = trim($removed_symbol_price, '\r');
        $removed_symbol_price = trim($removed_symbol_price, ' ');

        $removed_symbol_price = preg_replace("/[^0-9,.]/", "", $removed_symbol_price);
        $removed_comma_price = trim(str_replace(',', '.', trim($removed_symbol_price)));
        return $removed_comma_price;
    }

}
