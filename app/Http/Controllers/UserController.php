<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Attending;
use App\Http\Resources\user as UserResource;
use App\Http\Resources\mark as MarkResource;
use App\Http\Resources\attending as AttendingResource;
use App\Http\Resources\TokenResource as TokenResource;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Auth;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;


class UserController extends Controller
{
    public $loginAfterSignUp = true;
    
        public function __construct()
        {
          $this->middleware('auth:api', ['except' => ['login','register','getToken']]);
          $this->guard = "api";
        }

        public function register(Request $request)
        {
          
            //$user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;
            $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'universityID' => $request->universityID,
            'password' => bcrypt($request->password),
            'Section' => $request->Section,
            'Season' => $request->Season,
            'Class' => $request->Class,
            'Year' => $request->Year,
            'SeasonCourses' => $request->SeasonCourses,
            'OtherCourses' => $request->OtherCourses,
            'IsAdmin' => $request->IsAdmin,
          ]);
    
          $token = auth('api')->login($user);
    
          return $this->respondWithToken($token,$request->IsAdmin);
        }
    

        public function login(Request $request)
        {
          $credentials = $request->only(['universityID', 'password']);
    
          if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
          }
    
          return $this->respondWithToken($token,$request->isAdmin);
        }

        public function getAuthUser(Request $request)
        {
            return response()->json(auth('api')->user());
        }

        public function logout()
        {
            auth('api')->logout();
            return response()->json(['message'=>'Successfully logged out']);
        }

        protected function respondWithToken($token, $isAdmin=null)
        {
          if(!$isAdmin)
          {
              $isAdmin = '0';
          }else {
              $isAdmin = '1';
          }
          return response()->json([
            'access_token' => $token,
            'isAdmin' => $isAdmin,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
          ]);
        }

        public function getToken(Request $request)
        {
            $credentials = ['universityID' => request('universityID'), 'password' => request('password')];
            
             if (! $token = auth('api')->attempt($credentials)) {
                 return response()->json(['error' => 'Unauthorized'], 401);
            }
            return new TokenResource(['token' => $token]);
        }

        public function TestAuth()
        {
           return JWTAuth::parseToken()->authenticate();
        }

        public function refresh()
        {
            return $this->respondWithToken(auth('api')->refresh());
        }

    //////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function index()
    {
        $stds = User::paginate(15);
        return UserResource::collection($stds);
    }
    public function show($id)
    {
        $std = User::findOrFail($id);
        return new UserResource($std);
    }
    public function destroy($id)
    {
        $std = User::findOrFail($id);
        if($std->delete()){
            return new UserResource($std);
        }
    }
    public function marks($id)
    {
        $std = User::findOrFail($id);
        $marks = $std->marks;
        return MarkResource::collection($marks);
    }
    public function attendings($id)
    {
        $std = User::findOrFail($id);
        $attendings = $std->attendings;
        return AttendingResource::collection($attendings);
    }
    public function NewAttending(Request $request)
    {
        $attend = $request->isMethod('put') ? Attending::where('StudentID',$request->StudentID)->firstOrFail() : new Attending;
        
              $id = $request->StudentID;
              $tid=auth('api')->user()->stdID();
              //print_r($t);
              if( $id != $tid) return response()->json(['error' => 'Unauthorized STD'], 401);
                $attend->StudentID = $request->input('StudentID');
                $attend->CourseName = $request->input('CourseName');
                $attend->isLaboratory = $request->input('isLaboratory');
                $attend->CourseDate = $request->input('CourseDate');
        
                if($attend->save()){
                    return new AttendingResource($attend);
                }
    }
}
