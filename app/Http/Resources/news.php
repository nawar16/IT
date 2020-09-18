<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class news extends JsonResource
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
                'ID' => $this->ID,
                'Title' => $this->Title,
                'Details' => $this->Details,
                'PostDate' =>$this->PostDate,
                'TargetStudents' => $this->TargetStudents,
                'TargetProffessors' => $this->TargetProffessors,
            ]
        ];
        //parent::toArray($request);
    }
}
