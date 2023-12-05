<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{
    public function register(Request $request)
    {   
      try {
        $validator = Validator::make([
          "email" => $request->email,
          "password" => $request->password,
          'firstname'=>$request->firstName,
          'lastname'=>$request->lastName,
          'company'=>$request->company,
          'password_confirmation'=>$request->confirmPassword
      ], [
          'email' => 'required|string|email|max:255',
          'password' => 'required|string|min:6|confirmed',
          'firstname' => 'required',
          'lastname' => 'required',
          'company' => 'required',
      ]);
      
      //if validation fails
      if ($validator->fails()) {
        return response()->json(["status"=>"failed","validation_error"=>$validator->errors(),"message"=>"validation error"], 400);
      }

        $user = User::create(['email'=>$request->email,'password'=>Hash::make($request->password),
        'name'=>$request->firstName.' '.$request->lastName,'company'=>$request->company]);

        //if user was created successfully
        if ($user) {
            $data = ["status"=>"success","message"=>"user created successfully"];
            return response()->json($data, 200);
        }
        else{
            return response()->json(["status"=>"failed","message"=>"something went wrong"], 400);
        }
      } catch (\Exception $e) {
        return response()->json(["status"=>"failed","message"=>$e->getMessage()], 400);
      }
    }


    public function login(Request $request)
    {   
      try {
        $validator = Validator::make([
          "email" => $request->email,
          "password" => $request->password,
      ], [
          'email' => 'required|string|email|max:255',
          'password' => 'required|string|min:6',
      ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json(["status"=>"failed","validation_error"=>$validator->errors(),"message"=>"validation error"], 400);
        }
  

       $user = User::where('email',$request->email)->first();
       
       //identify user
       if (Hash::check($request->password, $user->password)) {
        $user_browser = $request->browser;

       //generate unique token for user
       $token = $user->createToken($user_browser)->plainTextToken;
       $data = ['status'=>'success','token'=>$token,'name'=>$user->name,"message"=>"logged on successfully"];
       return response()->json($data, 200);
       }
       else{
        return response()->json(["status"=>"failed","message"=>"unauthorized"], 401); 
       }
      } catch (\Exception $e) {
        return response()->json(["status"=>"failed","message"=>$e->getMessage()], 400);
      }
      
    }  

    public function logout(Request $request){
      $user = User::where('email',$request->user()->email)->first();
      if ($user) {
        //revoke all user's tokens
        $user->tokens()->delete();
        return response()->json(["status"=>"success","message"=>"logged out successfully"], 200);
      }
      else{
        return response()->json(["status"=>"failed","message"=>"no user was found"], 404);
      }
     
    }
}
