<?php

namespace App\Http\Controllers;

use App\Constants\AuthConstants;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users=User::all();
        return view('pages.people')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
       new AuthResource(User::create($request->all()));
       return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $people = User::where('id',$id)->first();

        return response()->json(['status'=>'success','data'=>$people]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::where('id',$id)->first();

        $user->delete();
return redirect('/users');

    }

}
