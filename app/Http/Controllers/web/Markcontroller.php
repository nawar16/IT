<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mark;
use App\User;
use App\Course;
use App\Events\newMark;
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
                $std = User::findOrFail($mark->StudentID);
                $options = array(
                    'cluster' => 'ap2',
                    'encrypted' => true
                );
                $pusher = new \Pusher\Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    $options
                );
                $data['message'] = 'Hello '.$std->name.', you\'ve got new mark';
                if($mark->save()){
                    $pusher->trigger('std_'.$mark->StudentID , 'newMark', $data);
                    return redirect(route('doctor.dashboard'), $mark);
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
