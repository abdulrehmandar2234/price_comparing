<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\ScrapedCategory;
use App\User;
use App\Website;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $products = ScrapedCategory::count();
        $categories = Category::count();
        $brands = ScrapedCategory::where('brand', '!=', '')->distinct()->count();

        $websites = Website::count();
        $blogs = Blog::count();
        return view('home', compact('users', 'products', 'categories', 'brands', 'websites', 'blogs'));
    }
}
