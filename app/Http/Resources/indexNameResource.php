<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class indexNameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $array = [
            'id' => $this->id,
            'name' => $this->name
        ];
        return $array;
    }
}
