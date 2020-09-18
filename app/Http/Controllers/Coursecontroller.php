<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Course;
use App\Http\Resources\course as CourseResource;
use App\Http\Resources\mark as MarkResource;
use App\Http\Resources\attending as AttendingResource;

class Coursecontroller extends Controller
{
    
    public function index()
    {
        $courses = Course::paginate(15);
        return CourseResource::collection($courses);
    }
    public function store(Request $request)
    {
        $course = $request->isMethod('put') ? Course::findOrFail($request->Name) : new Course;
        
                $course->Name = $request->input('Name');
                $course->CourseTeacher = $request->input('CourseTeacher');
                $course->CourseYear = $request->input('CourseYear');
                $course->CourseSeason = $request->input('CourseSeason');
                $course->CourseNameAR = $request->input('CourseNameAR');
                $course->HaveLabCourse = $request->input('HaveLabCourse');
        
                if($course->save()){
                    return new CourseResource($course);
                }
                else{
                    return response([
                        'Status' => 0,
                        'Error' => 'Error adding Lab Course! Please try again!'
                    ]);
                }
    }

    public function show($name)
    {
        $course = Course::findOrFail($name);
        return new CourseResource($course);
    }

    public function destroy($name)
    {
        $course = Course::findOrFail($name);
        if($course->delete()){
            return new CourseResource($course);
        }
    }

    public function marks($name)
    {
        $course = Course::findOrFail($name);
        $marks = $course->marks;
        return MarkResource::collection($marks);
    }
    public function attendings($name)
    {
        $course = Course::findOrFail($name);
        $attendings = $course->attendings;
        return AttendingResource::collection($attendings);
    }

}
