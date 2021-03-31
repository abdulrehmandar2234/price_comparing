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
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backEnd.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.category.create');
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

        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('category_image', $name);
            $input['image'] = $name;
        }

        Category::create($input);

        return redirect()->route('categories.index')->with('success', 'Category Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ! Search
        // input name
        $products = ScrapedCategory::where('category_id', $id)->get();
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
            return view('frontEnd.category_products', compact('products', 'cart_count', 'cart', 'sum', 'wishlists', 'sliders', 'collections', 'categories'));
        }

        //     return view('frontEnd.category_products', compact('result', 'products', 'sliders', 'wishlists', 'carts', 'cart', 'cart_count', 'categories', 'recipecategories', 'sum', 'collections'));
        // }

        return view('frontEnd.category_products', compact('products', 'sliders', 'wishlists', 'cart', 'categories', 'recipecategories', 'sum'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backEnd.category.edit', compact('category'));
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
        $category = Category::findOrFail($id);
        $category->update($input);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $website = Category::findOrFail($id);
        // unlink(public_path() . $website->website_logo);
        $website->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
