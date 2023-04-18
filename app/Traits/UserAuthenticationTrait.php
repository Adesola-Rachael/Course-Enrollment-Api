<?php
namespace App\Traits;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait UserAuthenticationTrait{
    public function RegisterUser(Request $request){


        return   User::create([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'password' => Hash::make($request->get('password')),
       ]);

   }

   protected function respondWithToken($token)
   {
       return response()->json([
           'user'=>[
               'data'=>auth()->user(),
           ],
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth()->factory()->getTTL() * 60
       ]);
   }

   protected function getValidator(Request $request)
   {
       $rules = [
           'name'=>'required',
           'email'=>'required|email|unique:users',
           'password'=>'required',
       ];

       return Validator::make($request->all(), $rules);
   }

}