<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments=Payment::all();
        return view('pages.payments')->with('payments',$payments);
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
        $message = '';
        $request->validate([
            'type' => ['required', 'string', 'max:255'],
        ]);
        $payment = new Payment();
        $payment->type = $request->type;
        $payment->save();
//        return event(new Registered($user));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $payment = Payment::where('id',$id)->get();
        return response()->json(['status'=>'success','data'=>PaymentResource::collection($payment)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request)
    {
        $payment = Payment::where('id',$id)->get();
        if ($request->type==$payment->type) {
            return response()->json([
                "status" => 'error',
                "redirect" => route('payments')
            ],202);
        }
        else{
            $payment->type= $request->type;
            $payment->update();
            return response()->json([
                "status" => 'success',
                "redirect" => redirect('payments')
            ],201);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = Payment::where('id',$id)->first();

        $user->delete();
        return redirect('/payments');

    }
}
