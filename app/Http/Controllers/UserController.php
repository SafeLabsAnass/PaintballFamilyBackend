<?php

namespace App\Http\Controllers;

use App\Constants\AuthConstants;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Models\Site;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $sites=Site::all();
        return view('pages.peoples')->with('items',[AuthResource::collection($users),$sites]);
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
        $user = new User();
        $user->username = $request['username'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->site_id = $request['site_id'];
        $user->password = $request['password'];
        $user->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $people = User::where('id',$id)->get();

        return response()->json(['status'=>'success','data'=>AuthResource::collection($people)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('id', $id)->first();
        $site = DB::table('sites')->where('name',$request->site)->first();
        if ($request->username == $user->username && $request->first_name == $user->first_name && $request->last_name== $user->last_name
            && $site->id == $user->site_id && $request->gender== $user->gender) {
            return response()->json([
                "status" => 'error',
                'message' => 'Operation failed',
                "redirect" => url('/peoples')
            ]   );
        }
        else{
            $user->username= $request->username;
            $user->first_name = $request->first_name ;
            $user->last_name = $request->last_name ;
            $user->gender = $request->gender ;
            $user->site_id = $site->id;
            $user->update();
            return response()->json([
                "status" => 'success',
                'message' => 'Operation success',
                "redirect" => url('/peoples')
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::where('id',$id)->first();

        $user->delete();
return redirect('/peoples/');

    }

}
