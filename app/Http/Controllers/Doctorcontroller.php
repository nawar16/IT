<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Doctor;
use App\User;
use App\Attending;
use App\Http\Resources\attending as AttendingResource;
use App\Http\Resources\doctor as DoctorResource;
use App\Http\Resources\course as CourseResource;
use App\Http\Resources\TokenResource as TokenResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;

class Doctorcontroller extends Controller
{

    public $loginAfterSignUp = true;
    
        public function __construct()
        {
          $this->middleware('auth:doctors', ['except' => ['login','register','getToken']]);
          $this->guard = "doctors";
        }

        public function register(Request $request)
        {
            //$doctor = $request->isMethod('put') ? Doctor::findOrFail($request->id) : new Doctor;
            $id = $request->id;
            try
            {
                Doctor::findOrFail($id);
                return response()->json([
                    'Status' => 0,
                    'Error' => 'An existing doctor have same ID'
                ]);
            }
            catch(ModelNotFoundException $e){
                $doctor = Doctor::create([
                    'id' => $request->id,
                    'Name' => $request->name,
                    'password' => bcrypt($request->password),
                    'Certification' => $request->Certification,
                  ]);
            
                  $token = auth('doctors')->login($doctor);
            
                  return $this->respondWithToken($token);
            }
        }
    

        public function login(Request $request)
        {
          $credentials = $request->only(['name', 'password']);
    
          if (!$token = auth('doctors')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
          }
    
          return $this->respondWithToken($token);
        }

        public function getAuthUser(Request $request)
        {
            return response()->json(auth('doctors')->user());
        }

        public function logout()
        {
            auth('doctors')->logout();
            return response()->json(['message'=>'Successfully logged out']);
        }

        protected function respondWithToken($token)
        {
          return response()->json([
            'Status' => 1,
            'Success' => 'Doctor has been added successfully!',
            'Result' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('doctors')->factory()->getTTL() * 60
            ]
          ]);
        }

        public function getToken(Request $request)
        {
            $credentials = ['name' => request('name'), 'password' => request('password')];
            
             if (! $token = auth('doctors')->attempt($credentials)) {
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
            return $this->respondWithToken(auth('doctors')->refresh());
        }

    //////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $doctors = Doctor::paginate(15);
        return DoctorResource::collection($doctors);
    }
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return new DoctorResource($doctor);
    }
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        if($doctor->delete()){
            return new DoctorResource($doctor);
        }
    }
    public function courses($id)
    {
        $doctor = Doctor::findOrFail($id);
        $crs = $doctor->courses;
        return CourseResource::collection($crs);
    }
    public function courses1($id)
    {
        $doctor = Doctor::findOrFail($id);
        $crs = $doctor->coursesLAB;
        return CourseResource::collection($crs);
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
        
                $attend->StudentID = $request->input('StudentID');
                $attend->CourseName = $request->input('CourseName');
                $attend->isLaboratory = $request->input('isLaboratory');
                $attend->CourseDate = $request->input('CourseDate');
        
                if($attend->save()){
                    return new AttendingResource($attend);
                }
    }
}
