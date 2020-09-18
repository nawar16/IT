<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class dailyprogram extends JsonResource
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
                'CourseName' => $this->CourseName,
                'ClassNumber' => $this->ClassNumber,
                'Year' => $this->Year,
                'Day' => $this->Day,
                'Time' => $this->Time,
                'Place' => $this->Place,
            ]
        ];
        //return parent::toArray($request);
    }
}
