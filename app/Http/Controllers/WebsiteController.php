<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::paginate(10);
        return view('backEnd.website.index', compact('websites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.website.create');
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
        if ($file = $request->file('website_logo')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('product', $name);
            $input['website_logo'] = $name;
        }

        Website::create($input);

        return redirect()->route('websites.index')->with('success', 'Website Added successfully');
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
        $website = Website::findOrFail($id);
        return view('backEnd.website.edit', compact('website'));
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
        $website = Website::findOrFail($id);

        if ($file = $request->file('website_logo')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('product', $name);
            $input['website_logo'] = $name;
        }

        $website->update($input);
        return redirect()->route('websites.index')->with('success', 'Website updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $website = Website::findOrFail($id);
        // unlink(public_path() . $website->website_logo);
        $website->delete();
        return redirect()->route('websites.index')->with('success', 'Website deleted successfully');
    }
}
