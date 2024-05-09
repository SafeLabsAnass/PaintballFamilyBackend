<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaleResource;
use App\Models\Payment;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceSetting;
use App\Constants\SaleConstants;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all()->sortBy('facture_id');
        return view('pages.sales')->with('sales', $sales);
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
        $sale = Sale::where('id', $id)->first();

        return response()->json(new SaleResource($sale), 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request)
    {
        $sale = Sale::where('id', $id)->first();
        if ($request->status != 'Draft') {
            if ($request->total_paid < $sale->total_amount && $request->status == 'Paid') {
                return response()->json([
                    "status" => 'error',
                    "message" => 'Please select Unpaid the total paid lower to total amount'
                ], 201);
            }elseif ($request->total_paid < $sale->total_amount && $request->status == 'Unpaid'){
                return response()->json([
                    "status" => 'error',
                    "message" => 'Please select Edit the total paid to be > 0'
                ], 201);
            } elseif ($request->total_paid == $sale->total_amount && $request->status == 'Unpaid') {
                return response()->json([
                    "status" => 'error',
                    "message" => 'Please select Paid the total paid == total amount'
                ], 201);
            }
            else {
                $topSaleFacture = DB::select("SELECT MAX(CAST(SUBSTRING_INDEX(facture_id, '#', -1) AS UNSIGNED)) AS max_initial_count
        FROM sales WHERE facture_id LIKE 'FACTURE%'")[0]->max_initial_count;
                if ($topSaleFacture == null) {
                    $prefix_id = InvoiceSetting::all()->first()->prefix_id;
                    $initial_count = InvoiceSetting::all()->first()->initial_count;
                    $sale->facture_id = $prefix_id . (int)$initial_count;
                } else {
                    if ($request->status == 'Paid') {
                        $prefix_id = InvoiceSetting::all()->first()->prefix_id;
                        $initial_count = (int)$topSaleFacture + 1;
                        $sale->facture_id = $prefix_id . $initial_count;
                    }
                }
                $sale->status = $request->status;
                $sale->payment_id = Payment::where('type', $request->payment)->first()->id;
                $sale->total_amount = $request->total_amount;
                $sale->total_paid = $request->total_paid;
                $sale->save();
                return response()->json(
                    [
                        "status" => 'success',
                        "message" => SaleConstants::UPDATE
                    ],
                    201
                );
            }
        } else {
            return response()->json([
                "status" => 'error',
                "message" => 'Please edit the Draft status'
            ], 201);
        }
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
        $sale = SaLe::where('id', $id)->first();

        $sale->delete();
        return redirect('/sales');
    }
}
