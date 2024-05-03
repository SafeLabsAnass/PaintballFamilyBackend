<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaleResource;
use App\Models\SaLe;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::all();
        return view('pages.sales')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $sale = Sale::where('id',$id)->first();

        return response()->json(new SaleResource($sale),201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaLe $saLe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaLe $saLe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $sale = SaLe::where('id',$id)->first();

        $sale->delete();
        return redirect('/sales');
    }
}
