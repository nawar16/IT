<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Attending;
use App\User;
use App\Course;
use App\Http\Resources\attending as AttendingResource;
use App\Http\Resources\user as UserResource;
use App\Http\Resources\course as CourseResource;

class Attendingcontroller extends Controller
{
   
    public function index()
    {
        $attend = Attending::paginate(15);
        return AttendingResource::collection($attend);
    }

    public function show($id)
    {
        $attend = Attending::where('StudentID',$id)->firstOrFail();
        return new AttendingResource($attend);
    }

    public function destroy($id)
    {
        $stdA = Attending::where('StudentID',$id)->firstOrFail();
        if($stdA->delete()){
            return new AttendingResource($stdA);
        }
    }

    public function destroy1($name)
    {
        $crsA = Attending::where('CourseName',$name)->firstOrFail();
        if($crsA->delete()){
            return new AttendingResource($crsA);
        }
    }
}
