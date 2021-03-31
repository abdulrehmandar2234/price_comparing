<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisements = Advertisement::all();
        return view('backEnd.advertisement.index' , compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.advertisement.create');
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

        if ($file = $request->file('banner')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['banner'] = $name;
        }

        Advertisement::create($input);

        return redirect()->route('advertisement.index')->with('success', 'Adversisement Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
      $advertisement= $request->all();
      $advertisement  = Advertisement::create($advertisement);
    //   return redirect()->route('category_links.index')->with('success', 'Category Link Added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Advertisement::findOrFail($id);
        $blog->delete();
        return redirect()->route('advertisement.index')->with('success', 'Advertisement deleted successfully');
    }

    public function view()
    {
        
    }
}
