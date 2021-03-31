<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Wishlist;
use App\Collection;
use App\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $collections = Collection::all();
        $recipecategories  = RecipeCategory::all();
        if(Auth::check()){
          $user      =  Auth::id();
          $wishlists = Wishlist::where('user_id', $user)->get();
        
        // $wishlists = $wishlists->toArray();
        // $carts = Cart::all();
        // $carts = $carts->toArray();
        $cart_count = 0;
        $cart_count = Cart::where('user_id' , Auth::user()->id)->count();

        
        // dd($wishlists);
        $cart= array();
        $sum = 0;
        $carts = Cart::where('user_id', $user);
        foreach ($carts as $key => $product) {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->product->product_name,
                'category' =>$product->product->category->category_name,
                'brand' => $product->product->brand->brand_name,
                // 'image' => dd($product->product)
            ];
            $stores = array();
            // dd($product->product->product_links);
            $sum +=floatval(preg_replace("/[^-0-9\.]/","",str_replace(',', '.', $product->product->product_links[0] ->product_price)));
          
            // dd($product->product->product_links);
            foreach ($product->product->product_links as $index => $links) {
                $stores[$index] = [
                    'price' => '€'.floatval(preg_replace("/[^-0-9\.]/","",str_replace(',', '.', $links->product_price))),
                    'website' => $links->website->website_name,
                    'website_logo' => $links->website->website_logo,
                    'discount' =>  $links->product_discount,
                    'unit' =>  $links->product_unit,
                    'unit_price' =>  $links->product_unit_price,
                    'updated' =>  $links->product_updated,
                    'image' =>  $links->product_image
                ];
               
                $max = 0;

                // foreach ($stores as $discounted_store) {
                //     preg_match_all('!\d+!', $discounted_store['discount'], $matches);
                //     // $max =  max(array_column($discounted_store, $discounted_store['discount']));
                //     $max = max(array($max, $matches));
                // }

            }
            $cart[$key]['stores'] = $stores;
            
           
        }
        
        
        
        return view('frontEnd.wishlist',compact('wishlists','cart','cart_count','categories','recipecategories','sum','collections'));
        }else {
            return view('frontEnd.wishlist', compact('sum','collections'));
        }
       
           
        
        

        

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
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        
       if(Wishlist::where(['user_id' => $input['user_id'] , 'product_id' => $input['product_id']])->exists())
       {
        return redirect()->back()
        ->with('error','Product are already in wishlist');
       }

        $wishlist = Wishlist::create($input);
       
        return redirect()->back()
            ->with('success','Product added to wishlist successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $wishlist  = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->back()->with('success','Product removed from wishlist successfully');
    }
}
