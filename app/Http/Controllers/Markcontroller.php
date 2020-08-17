<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mark;
use App\User;
use App\Course;
use App\Http\Resources\mark as MarkResource;
use App\Http\Resources\user as UserResource;
use App\Http\Resources\course as CourseResource;

class Markcontroller extends Controller
{

    public function index()
    {
        $marks = Mark::paginate(15);
        return MarkResource::collection($marks);
    }

    public function store(Request $request)
    {
        $mark = $request->isMethod('put') ? Mark::where('StudentID',$request->StudentID)->firstOrFail() : new Mark;
        
                $mark->StudentID = $request->input('StudentID');
                $mark->CourseName = $request->input('CourseName');
                $mark->LabHomeworkMark = $request->input('LabHomeworkMark');
                $mark->LabExamMark = $request->input('LabExamMark');
                $mark->FinalExamMark = $request->input('FinalExamMark');
                $std = User::findOrFail($mark->StudentID)->get();
                if($mark->save()){
                    event(new newMark($std));
                    return new MarkResource($mark);
                }
    }

    public function destroy($id)
    {
        $stdM = Mark::where('StudentID',$id)->firstOrFail();
        if($stdM->delete()){
            return new MarkResource($stdM);
        }
    }

    public function destroy1($name)
    {
        $crsM = Mark::where('CourseName',$name)->firstOrFail();
        if($crsM->delete()){
            return new MarkResource($crsM);
        }
    }
}
