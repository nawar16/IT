<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\DailyProgram;
use App\Http\Resources\dailyprogram as DailyProgramResource;


class DailyProgramcontroller extends Controller
{

    public function index()
    {
        $prog = DailyProgram::paginate(1);
        return DailyProgramResource::collection($prog);
    }

    public function store(Request $request)
    {
        $prog = $request->isMethod('put') ? DailyProgram::where('Year',$request->year)->firstOrFail() : new DailyProgram;
        
                $prog->CourseName = $request->input('CourseName');
                $prog->DoctorID = $request->input('DoctorID');
                $prog->ClassNumber = $request->input('ClassNumber');
                $prog->Year = $request->input('Year');
                $prog->Day = $request->input('Day');
                $prog->Time = $request->input('Time');
                $prog->Place = $request->input('Place');
        
                if($prog->save()){
                    return new DailyProgramResource($prog);
                }
    }

    public function destroy($year)
    {
        $prog = DailyProgram::where('Year',$year)->firstOrFail();
        if($prog->delete()){
            return new DailyProgramResource($prog);
        }
    }
}

