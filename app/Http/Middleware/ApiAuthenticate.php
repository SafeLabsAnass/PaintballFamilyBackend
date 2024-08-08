<?php

namespace App\Http\Middleware;

use App\Constants\AuthConstants;
use App\Http\Controllers\Controller;
use App\Http\Traits\HttpResponses;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticate extends Controller
{
    use HttpResponses;

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        Log::info('Authorization Header: ' . $request->header('Authorization'));

        $token = $request->bearerToken();
        Log::info('Bearer Token: ' . $token);

        if ($user = auth('sanctum')->user()) {
            auth()->login($user);

            return $next($request);
        }
        Log::error('Unauthorized access attempted.');
        return $this->error([], AuthConstants::UNAUTHORIZED);
    }
}
