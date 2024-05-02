<?php

namespace App\Http\Controllers;

use App\Constants\AuthConstants;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Models\Role;
use App\Models\Site;
use App\Models\User;
use http\Message;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

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
        $message = '';
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $site = Site::where('name',$request->site)->first();
        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->site_id = $site->id;
        $user->gender = $request->gender;
        $user->save();
        $role = Role::where('name',$request->role)->first();
        $user->roles()->save($role);
//        return event(new Registered($user));
        if($message!='') {
            return response()->json(['status' => 'error', 'message' => $message],200);
        }
        else{
            return response()->json(['status'=>'success','redirect'=>route('peoples')]);
        }
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
            && $site->id == $user->site_id && $request->gender== $user->gender && $request->phone== $user->phone) {
            return response()->json([
                "status" => 'error',
                "redirect" => url('/peoples')
            ],202);
        }
        else{
            $user->username= $request->username;
            $user->first_name = $request->first_name ;
            $user->last_name = $request->last_name ;
            $user->gender = $request->gender ;
            $user->phone = $request->phone ;
            $user->site_id = $site->id;
            $user->update();
            return response()->json([
                "status" => 'success',
                "redirect" => url('/peoples')
            ],201);
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
        return redirect('/peoples');

    }

}
