<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Cart;
use App\User;
use App\Slider;
use App\Product;
use App\Category;
use App\Wishlist;
use App\Collection;
use App\Ingredient;
use App\Advertisement;
use App\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function latest()
    // {
    //     $blogs = Blog::latest();
    //     $categories = Category::all();
    //     return view('blogs.singlepage',compact('blogs' ,'categories'));
    // }
    public function viewAllBlogs()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        $collections = Collection::all();
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
                    // $max =  max(array_column($discounted_store, $discounted_store['discount']));
                    $max = max(array($max, $matches));
                }
            }

            $result[$key]['stores'] = $stores;
        }
        $sum = 0;
        $adds = Advertisement::all();
        $cart = array();
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id);
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
           
            return view('blogs.index', compact('adds','blogs', 'categories', 'recipecategories', 'cart_count', 'cart', 'sum', 'collections' ));
        }

        return view('blogs.index', compact('adds','blogs', 'categories', 'recipecategories', 'cart', 'sum', 'collections' ));
    }

    public function singlepage($id)
    {
        $user = User::find($id);
        $posts = Blog::find($id);
        $specificIngredients = Blog::where('id', $id)->with('products')->first();
        // $total = DB::table('users_stats')
        // ->where('id', '')
        // ->sum(\DB::raw('logins_sun + logins_mon'));
        // dd($specificIngredients);

        // dd($specificIngredients);
        $latest = Blog::latest()->take(5)->get();
        $recipecategories = RecipeCategory::all();
        $categories = Category::all();
        $collections = Collection::all();

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
                    // $max =  max(array_column($discounted_store, $discounted_store['discount']));
                    $max = max(array($max, $matches));
                }
            }

            $result[$key]['stores'] = $stores;
        }
        $sum = 0;

        $cart = array();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
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

        if (Auth::check()) {
            $cart_count = 0;
            $cart_count = Cart::where('user_id', Auth::user()->id)->count();
            return view('blogs.singlepage', compact('posts', 'recipecategories', 'cart', 'latest', 'categories', 'specificIngredients', 'sum', 'cart_count', 'collections'));
        }

        return view('blogs.singlepage', compact('posts', 'recipecategories', 'latest', 'cart', 'categories', 'specificIngredients', 'sum', 'collections'));
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('backEnd.blog.index', compact('blogs'));
    }
    public function blog()
    {
        $blogs = Blog::where('status', '=', 'Publish')->get();

        return view('blog', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RecipeCategory::all();
        $products = Product::all();
        return view('backEnd.blog.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
            'serving' => 'required',
            'quantity' => 'required',
            'preparation_time' => 'required',
            'cooking_time' => 'required',
            'product_id' => 'required',
        ]);

        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }

        $blogs = Blog::create($input);

        $result = array();
        foreach ($product_id as $key => $product) {
            $result[$key] = [
                'quantity' => $quantity[$key],
                'blog_id' => $blogs->id,
                'product_id' => $product,
            ];
            DB::table('blog_product')->insert($result[$key]);
        }

        return redirect()->route('blog.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $categories = RecipeCategory::all();

        $ingredients = Ingredient::all();

        return view('backEnd.blog.edit', compact('blog', 'categories', 'ingredients'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);

        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }

        $blog->update($input);
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
    }
    public function addproducts(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $data = [
            ['user_id' => $input['user_id'], 'product_id' => $input['product_id'], 'quantity' => $input['quantity']],
        ];

        Cart::insert($data); // Eloquent approach

        return redirect()->back();
    }
}
