<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class doctor extends JsonResource
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
                'id' => $this->id,
                'Name' => $this->Name,
                'Certification' => $this->Certification,
            ]
        ];
        //return parent::toArray($request);
    }
}
