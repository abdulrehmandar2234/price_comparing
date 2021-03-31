<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Collection::all();
        return response()->json($collection);
        
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
        // Validate
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


         // dd($request->user()->name);

         $input = $request->all();
         $user_id = $request->user()->id;
         $input['user_id'] = $user_id;
         $collection =  Collection::create($input);
        
         
         $cart = Cart::where('user_id' , $user_id)->get();
       
         foreach ($cart as  $value) {
             
             $record = [
                 'collection_id' => $collection->id,
                 'product_id' => $value->product_id,
                 'quantity' => "1"
             ];
             DB::table('collections_products')->insert($record);
            //  dd('test');
         }

        //  return $record;
 
        //  $collection = $var;
        //   $new = Collection::where('id' , $collection->id)->with('product');
 
         return response()->json($collection);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Collection = Collection::findOrFail($id);
        $Collection->delete();
        $response = [
            'status' => true,
            'message' => 'Deleted',
            'products' => $Collection
        ];
        return response()->json($response);
    }
}
