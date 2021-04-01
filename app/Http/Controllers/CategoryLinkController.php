<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryLink;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryLink::with('category', 'website')->get();
        return view('backEnd.category_link.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Website::all();
        $categories = Category::all();
        return view('backEnd.category_link.create', compact('websites', 'categories'));
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
            'category_link' => ['required', 'unique:category_links'],
        ]);
        $input = $request->all();
        $input['last_updated'] = today();

        CategoryLink::create($input);

        return redirect()->route('category_links.index')->with('success', 'Category Link Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryLink  $categoryLink
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryLink $categoryLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryLink  $categoryLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryLink::findOrFail($id);
        $websites = Website::all();
        $categories = Category::all();
        return view('backEnd.category_link.edit', compact('websites', 'categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryLink  $categoryLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $category = CategoryLink::findOrFail($id);

        $category->update($input);
        return redirect()->route('category_links.index')->with('success', 'Category Link updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryLink  $categoryLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryLink = CategoryLink::findOrFail($id);
        $categoryLink->delete();
        return redirect()->route('category_links.index')->with('success', 'Category Link deleted successfully');
    }
}
