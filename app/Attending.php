<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attending extends Model
{
    
    protected $table = 'attendings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'StudentID', 'CourseName', 'isLaboratory' , 'CourseDate'
    ];
    public function user(){

        return $this->belongsTo('App\User');
        
    }
    public function course(){

        return $this->belongsTo('App\Course');
        
    }
}
