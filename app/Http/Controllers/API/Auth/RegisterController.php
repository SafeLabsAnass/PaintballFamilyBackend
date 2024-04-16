<?php

namespace App\Http\Controllers\API\Auth;

use App\Constants\AuthConstants;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Http\Traits\HttpResponses;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use HttpResponses;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = new User();
        $user->username = $input['username'];
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->phone = $input['phone'];
        $user->email = $input['email'];
        $user->gender = $input['gender'];
        $user->site_id = $input['site_id'];
        $user->password = $input['password'];
        $user->save();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['username'] = $user->username;

        event(new UserRegistered($user));

        return $this->success(new AuthResource($success), AuthConstants::REGISTER);
    }
}
