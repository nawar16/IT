<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'OtherCourses' => $this->OtherCourses,
            'Year' => $this->Year,
            'Class' => $this->Class,
            'IsAdmin' => $this->IsAdmin,
        ];
        //return parent::toArray($request);
    }
}
