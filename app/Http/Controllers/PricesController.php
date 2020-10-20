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
        $coffee = new Prices;
        $coffee->fill($request->all());
        $coffee->save();
       
        return $coffee;
    
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
     * Show the form for editing the specified resource.
     *
     * @param  Prices  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Prices  $price)
    {
        // return view('edit', ['price' => $price]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   Prices  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prices $price)
    {
        // $price->fill($request->all());
        // $price->save();
        // return redirect()->route('prices.index');
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

        if ($price->delete()){
            return new PricesResource($price);
        }
        
    }
}
