<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Report extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->name,
            'plat_no' => $this->id_station,
            'message' => $this->latitude,
        ];
    }
    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://qlicue.co.tz/')
        ];
    }
}
