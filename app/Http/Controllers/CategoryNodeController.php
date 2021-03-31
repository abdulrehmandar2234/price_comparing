<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryNode;
use App\Website;
use Illuminate\Http\Request;

class CategoryNodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_nodes = CategoryNode::all();
        return view('backEnd.category_node.index', compact('category_nodes'));
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

        return view('backEnd.category_node.create', compact('categories', 'websites'));
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
        CategoryNode::create($input);
        return redirect()->route('category_nodes.index')->with('success', 'Category Node Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryNode  $categoryNode
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryNode $categoryNode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryNode  $categoryNode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $websites = Website::all();
        $categories = Category::all();
        $category_node = CategoryNode::findOrFail($id);

        return view('backEnd.category_node.edit', compact('categories', 'websites', 'category_node'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryNode  $categoryNode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $category_node = CategoryNode::findOrFail($id);

        $category_node->update($input);
        return redirect()->route('category_nodes.index')->with('success', 'Category Node updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryNode  $categoryNode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_node = CategoryNode::findOrFail($id);
        // unlink(public_path() . $website->website_logo);
        $category_node->delete();
        return redirect()->route('category_nodes.index')->with('success', 'Category Node deleted successfully');
    }
}
