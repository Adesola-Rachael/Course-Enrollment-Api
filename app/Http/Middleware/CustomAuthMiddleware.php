<?php

namespace App\Http\Middleware;
use App\Traits\ResponseTrait;
use Closure;
use App\Interfaces\StatusCode;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class CustomAuthMiddleware
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()){
            return $next($request);
        } else {
            return $this->apiResponse('You Are Unathorized', null, StatusCode::UNAUTHORIZED);
        }
    }
}