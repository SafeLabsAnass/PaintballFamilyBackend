<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return View
     */
    public function create(): View
    {
        $usersWithRole = User::whereHas('roles', function ($query) {
            $query->where('name', 'superadministrator');
        })->get();
        return view('auth.login')->with('admins',$usersWithRole->count());
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */


    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);


            $login = User::where('email', $request->input('email'))->first();
            if ($login) {
                if (
                    User::where(
                        'password',
                        $request->input('password')
                    ) &&
                    User::where(
                        'email',
                        $request->input('email')
                    ) && Auth::attempt($request->only('email', 'password'))) {
                    $request->session()->regenerate();

                    return response()->json([
                        "status" => 'success',
                        "redirect" => url('/home'),
                    ]);
                } else {
                    return response()->json([
                        "status" => 'error',
                        "redirect" => url('/'),
                        "message" => 'Mot de passe erroné'
                    ]);
            }
        } else {
                return response()->json([
                    "status" => 'error',
                    "redirect" => url('/'),
                    "message" => 'Vous n\'avez pas de compte'
                ]);
            }
        } catch (QueryException|ValidationException) {
            return response()->json([
                "status" => 'error',
                "redirect" => url('/'),
                "message" => 'Votre connexion à l\'internet est désactivée !'
            ]);
        }
    }



/**
 * Destroy an authenticated session.
 *
 * @param Request $request
 * @return RedirectResponse
 */
public
function destroy(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
}
