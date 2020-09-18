<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return  [
            'Status' => 1,
            'Result' => [
                'Name' => $this->Name,
                'DoctorID' => $this->DoctorID,
                'TeacherID' => $this->TeacherID,
                'CourseYear' => $this->CourseYear,
                'CourseSeason' => $this->CourseSeason,
                'CourseNameAR' => $this->CourseNameAR,
                'HaveLabCourse' => $this->HaveLabCourse,
            ]
        ];
        //return parent::toArray($request);
    }
}
