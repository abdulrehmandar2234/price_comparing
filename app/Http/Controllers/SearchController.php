<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Cart;
use App\Category;
use App\Collection;
use App\RecipeCategory;
use App\ScrapedCategory;
use App\Slider;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function comuniti_search(Request $request)
    // {

    //     $index = new ComunitiController();

    //     $res = $req->get_products('https://comuniti.pt/en/jolisearch?s=' . $request->search, '.c-product__name', '.c-badge__text', '.c-product__price', '.c-product__photo');
    //     return view('frontEnd.product-list', compact('res', 'sort'));
    // }

    public function searchitem(Request $request)
    {
        // ! Search
        // input name
        $query = $request->input('product_name');
        $products = ScrapedCategory::where('title', 'LIKE', '%' . $query . '%')->get();
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
            return view('frontEnd.product-list', compact('products', 'cart_count', 'cart', 'sum', 'wishlists', 'sliders', 'collections', 'categories'));
        }

        return view('frontEnd.product-list', compact('products', 'sliders', 'wishlists', 'cart', 'categories', 'recipecategories', 'sum'));

    }

    public function search(Request $request)
    {

        // $products = array();
        // $websites =  SearchWebsite::all();

        // $req = new RequestController();
        // foreach ($websites as $web) {
        //     if ($web->search_url_node != "") {

        //         $search_url = str_replace('PRODUCT_NAME_SEARCH', $request->search, $web->search_url_node);

        //         $products[] = $req->get_search_products($search_url, $web->product_name_node, $web->product_unit_price_node, $web->product_price_node, $web->product_image_node, $web->product_description_node, $web->product_discount_node, $web->product_link_node);
        //     }
        // }
        // $single_products_array = array();
        // $key = 0;
        // foreach ($products as $product_list) {
        //     foreach ($product_list as $p) {
        //         $single_products_array[$key++] = $p;
        //     }
        // }

        // $data = $this->paginate($single_products_array);
        // $carts = Cart::all();
        // $cart_count = 0;
        // $cart_count = Cart::count();

        return view('frontEnd.product-list', compact('data', 'cart_count', 'carts'));
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}

// $sort = '';
// if(request()->sort == 'low_high'){
//     $sort = $this->sortBy($res['price']);

// }elseif(request()->sort == 'high_low'){
//     $sort = $this->sortByDesc($res['price']);
// }
