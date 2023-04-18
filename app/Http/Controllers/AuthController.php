<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserAuthRequest;
use App\Traits\UserAuthenticationTrait;
// use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    use ResponseTrait,UserAuthenticationTrait;

    protected $RegisterService;
      /**
     * Create a new AuthController instance.
    *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }
   
    public function register(Request $request){

        $validateUser=$this->getValidator($request);

        if($validateUser->fails()){
            return $this->failure($validateUser->errors(),StatusCode::VALIDATION);
        }
       $user= $this->RegisterUser($request);

        return $this->success('User Created Successfully', $user, StatusCode::CREATED);

   }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->failure('You are Unauthorized', StatusCode::UNAUTHORIZED);
        }
        return $this->respondWithToken($token);
    }

   
}
