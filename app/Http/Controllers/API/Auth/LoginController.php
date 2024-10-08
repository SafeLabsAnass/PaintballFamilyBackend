<?php

namespace App\Http\Controllers\API\Auth;

use App\Constants\AuthConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HttpResponses;

    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request): JsonResponse
    {
        if (auth()->attempt($request->all())) {
            $user = auth()->user();
//            $user->tokens()->delete();

            $success = $user->createToken('PaintballFamily')->plainTextToken;

            return $this->success(['token' => $success,'user'=>$user], AuthConstants::LOGIN);
        }

        return $this->error([], AuthConstants::VALIDATION);
    }

    /**
     * @return
     */
    public function logout()
    {
        $user = Auth::user();

        $user->tokens()->delete();

        return $this->success([], AuthConstants::LOGOUT);
    }

    /**
     * @return JsonResponse
     */
    public function details(): JsonResponse
    {
        $user = auth()->user();

        return $this->success($user, '');
    }
}
