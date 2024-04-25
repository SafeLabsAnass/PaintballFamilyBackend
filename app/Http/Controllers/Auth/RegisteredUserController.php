<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Site;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    /**
     * @return mixed
     */
    private static $validate;

    /**
     * @return mixed
     */





    public function create()
    {
        $usersWithRole = User::whereHas('roles', function ($query) {
            $query->where('name', 'superadministrator');
        })->get();
        if ($usersWithRole->count() == 0) {
            return view('auth.register');
        }
        else{
            return redirect('/')->with('error', 'autorisée à l\'admin seulement');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $site = Site::take(1)->first();
        $user = new User();
        $user->username   = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->phone      = $request->phone;
        $user->email      = $request->email;
        $user->site_id    = $site->id;
        $user->password   = Hash::make($request->password);
        $user->save();

        $role = Role::where('name','superadministrator')->first();
        $user->roles()->save($role);
        event(new Registered($user));


//        Auth::login($user);
//
//        Auth::logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
