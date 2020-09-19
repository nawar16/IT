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
                'CourseTag' => $this->Name,
                'CourseTeachers' => $this->CourseTeachers,
                'CourseYear' => $this->CourseYear,
                'CourseSeason' => $this->CourseSeason,
                'CourseName' => $this->CourseNameAR,
                'IsHaveLabCourse' => $this->HaveLabCourse,
            ]
        ];
        //return parent::toArray($request);
    }
}
