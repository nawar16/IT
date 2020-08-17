<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'StudentID', 'CourseName', 'LabHomeworkMark', 'LabExamMark' , 'FinalExamMark'
    ];
    public function user(){

        return $this->belongsTo('App\User');
        
    }
    public function course(){

        return $this->belongsTo('App\Course');
        
    }
}
