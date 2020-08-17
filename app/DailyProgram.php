<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyProgram extends Model
{
    protected $table = 'dailyprogram';
    protected $primaryKey = 'id';
    protected $fillable = [
        'CourseName', 'ClassNumber' , 'Year' , 'Day' , 'Time' , 'Place'
    ];
    public function courses(){
        
        return $this->hasMany('App\Course','Name');
                
    }
}
