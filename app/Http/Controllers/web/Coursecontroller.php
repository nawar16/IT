<?php

namespace App\Http\Controllers\web;

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
        return view('home', $courses);
    }

    public function store(Request $request)
    {
        $course = $request->isMethod('put') ? Course::findOrFail($request->Name) : new Course;
        
                $course->Name = $request->input('Name');
                $course->DoctorID = $request->input('DoctorID');
                $course->TeacherID = $request->input('TeacherID');
                $course->CourseYear = $request->input('CourseYear');
                $course->CourseSeason = $request->input('CourseSeason');
                $course->CourseNameAR = $request->input('CourseNameAR');
                $course->HaveLabCourse = $request->input('HaveLabCourse');
        
                if($course->save()){
                    return redirect(route('doctor.dashboard'), $course);
                }
    }

    public function show($name)
    {
        $course = Course::findOrFail($name);
        return view('home', $course);
    }

    public function destroy($name)
    {
        $course = Course::findOrFail($name);
        if($course->delete()){
            return view('admin.dashboard', $course);
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

    public function lecture(Request $request)
    {
        $validation = $request->validate([
            'lec' => 'required|file|mimes:pdf,doc,docm,docx,dot'
            // for multiple file uploads
            // 'lec.*' => 'required|file|mimes:pdf,doc,docm,docx,dot|max:2048'
            ]);
        $file = $validation['lec']; // get the validated file*/
        //$file  = $request->file('lec');
        $year = $request->year;
        $f = $request->f;

        $filename = $file->getClientOriginalName() ;
        $path ='/Y'.$year.'/'.$f;
        \Storage::disk('public')->putFileAs($path, $file, $filename);

        return url('/').'/storage/app/public'.$path.'/'.$filename;
    }
    public function downloadlecture(Request $request)
    {

        $year = $request->year;
        $f = $request->f;
        $file = $request->file;
        return response()->download(
            storage_path("app/public/Y".$year."/".$f."/".$file.".pdf")
        );
    }
}
