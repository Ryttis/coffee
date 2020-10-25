<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Prices;
use App\Http\Resources\Prices as PricesResource;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return \App\Models\Prices::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $file = $request->file('image')->store('images', 'public');


        $coffee = new Prices();

        $coffee->path = $file;
        $coffee->fill($request->all());
        $coffee->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Models\Prices::find($id);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  Prices  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Prices::find($id);

        if ($price->delete()) {
            return new PricesResource($price);
        }
    }
}
