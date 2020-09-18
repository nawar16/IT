<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class attending extends JsonResource
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
                'StudentID' => $this->StudentID,
                'CourseName' => $this->CourseName,
                'isLaboratory' => $this->isLaboratory,
                'CourseDate' => $this->CourseDate,
            ]
        ];
        //return parent::toArray($request);
    }
}
