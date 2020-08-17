<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;
use Response;
use App\Doctor;
use App\Http\Resources\DoctorResource as DoctorResource;
use App\Http\Resources\TokenResource as TokenResource;

class DoctorrController extends Controller
{
    public $loginAfterSignUp = true;
    
    public function __construct()
    {
      $this->middleware('auth:doctors_web', ['except' => ['userLoginIndex','index','Login','Register']]);
      $this->guard = "doctors_web";
    }    
 // -------------------- [ user registration view ] -------------
    public function index() {
        return view('\doctor\auth\register');
    }

// --------------------- [ Register user ] ----------------------
    public function Register(Request $request) {

        // validate form fields
        $request->validate([
                'name' => 'required',
                'password' => 'required|min:6',
            ]);

        $input = $request->all();

        // if validation success then create an input array
        $inputArray= array(
            'name'  =>  $request->name,
            'password' => Hash::make($request->password),
        );

        // register user
        $user = Doctor::create($inputArray);

        // if registration success then return with success message
        if(!is_null($user)) {
            return back()->with('success', 'You have registered successfully.');
        }

        // else return with error message
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }


// -------------------- [ User login view ] -----------------------
    public function userLoginIndex() {
        return view('\doctor\auth\login');
    }

// --------------------- [ User login ] ---------------------
    public function Login(Request $request) {

        $request->validate([
            "name"           =>    "required",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('name', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('dashboard');
        }

        else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }


// ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard() {

        // check if user logged in
        if(Auth::check()) {
            return view('dashboard');
        }

        return redirect::to("user-login")->withSuccess('Oopps! You do not have access');
    }


// ------------------- [ User logout function ] ----------------------
public function logout(Request $request ) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('dashboard');
    }

//////////////////////////////////////////////////////////////////////////////////////////////////

public function courses($id)
    {
        $doctor = Doctor::findOrFail($id);
        $crs = $doctor->courses;
        return view('doctor.dashboard', $crs);
    }
public function courses1($id)
    {
        $doctor = Doctor::findOrFail($id);
        $crs = $doctor->coursesLAB;
        return view('doctor.dashboard', $crs);
    }
public function attendings($id)
    {
        $std = User::findOrFail($id);
        $attendings = $std->attendings;
        return view('doctor.dashboard', $attendings);
    }
public function NewAttending(Request $request)
    {
        $attend = $request->isMethod('put') ? Attending::where('StudentID',$request->StudentID)->firstOrFail() : new Attending;
        
                $attend->StudentID = $request->input('StudentID');
                $attend->CourseName = $request->input('CourseName');
                $attend->isLaboratory = $request->input('isLaboratory');
                $attend->CourseDate = $request->input('CourseDate');
        
                if($attend->save()){
                    return redirect(route('doctor.dashboard'), $attend);
                }
    }
}