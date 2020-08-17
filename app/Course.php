<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $keyType = 'string';
    protected $primaryKey = 'Name';
    protected $fillable = [
        'Name' ,'DoctorID','TeacherID',  'CourseYear' , 'CourseSeason','HaveLabCourse' ,'CourseNameAR'
    ];
    public function marks(){

        return $this->hasMany('App\Mark','CourseName');
        
    }
    public function attendings(){

        return $this->hasMany('App\Attending','CourseName');
        
    }
    public function doctor(){

        return $this->belongsTo('App\Doctor','id');

    }
    public function program(){
        
        return $this->belongsTo('App\DailyProgram');
                
    }

}
