<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Validator;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserAuthRequest;
use App\Traits\UserAuthenticationTrait;
use Tymon\JWTAuth\Exceptions\JWTException;
// use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    use ResponseTrait;

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
        $validateUser = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            
        ]);
        if($validateUser->fails()){
            return $this->setResponse($validateUser->errors(),null, StatusCode::VALIDATION);
        }
        try {  
            $user =  User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);
            return $this->setResponse('User Created Successfully',$user,  StatusCode::CREATED);
       
        } catch (JWTException $e) {                
            throw new Exception($e->getMessage()); 
        }
   }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials=$request->validate([
            'email'=>'required',    
            'password'=>'required'

        ]);

        try {  
            if (! $token = auth()->attempt($credentials)) {  
                return $this->setResponse(   'You Are Unathorized', null, StatusCode::UNAUTHORIZED);
            }            
        } catch (JWTException $e) {                
            throw new Exception($e->getMessage()); 
        }

        $data = [ 
                'auth_user' => auth()->user(),
                'access_token' => $token,            
                'token_type' => 'bearer',  
                'expires_in' => config('jwt.ttl')        
            ];

            return $this->setResponse( 'User login Successfully', $data, StatusCode::OK);
        }

   
}
