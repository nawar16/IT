<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class mark extends JsonResource
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
                'LabHomeworkMark' => $this->LabHomeworkMark,
                'LabExamMark' =>$this->LabExamMark,
                'FinalExamMark' => $this->FinalExamMark,
            ]
        ];
        //return parent::toArray($request);
    }
}
