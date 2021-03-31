<?php

namespace App\Http\Controllers;

use App\RecipeCategory;
use Illuminate\Http\Request;

class RecipeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipecategories = RecipeCategory::all();
        return view('backEnd.RecipeCategory.index', compact('recipecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.RecipeCategory.create');
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
            'name' => 'required',
            'image' => 'required',
        ]);

        $input = $request->all();

        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('product', $name);
            $input['image'] = $name;
        }

        RecipeCategory::create($input);

        return redirect()->route('recipecategory.index')->with('success', 'RecipeCategory Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RecipeCategory = RecipeCategory::findOrFail($id);
        return view('backEnd.RecipeCategory.edit', compact('RecipeCategory'));
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);
        
        $input = $request->all();
        $RecipeCategory = RecipeCategory::findOrFail($id);
        
        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('product', $name);
            $input['image'] = $name;
        }


        $RecipeCategory->update($input);
        return redirect()->route('recipecategory.index')->with('success', 'RecipeCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $website = RecipeCategory::findOrFail($id);
        // unlink(public_path() . $website->website_logo);
        $website->delete();
        return redirect()->route('recipecategory.index')->with('success', 'RecipeCategory deleted successfully');
    }
}
