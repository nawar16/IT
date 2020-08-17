<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    //login after registration
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
      $user = User::create([
        'id' => $request->id,
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'Year' => $request->Year,
        'Class' => $request->Class,
        'OtherCourses' => $request->OtherCourses,
        'IsAdmin' => $request->IsAdmin,
      ]);

      $token = auth()->login($user);

      //gets the token array structure
      return $this->respondWithToken($token);
    }
    
    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if (!$token = auth()->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }

    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }

}
