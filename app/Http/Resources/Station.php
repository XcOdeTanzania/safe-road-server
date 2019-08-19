<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Station extends JsonResource
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
            'name' => $this->name,
            'id_station' => $this->id_station,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'district' => $this->district,
            'id_district' => $this->id_district,
            'region' => $this->region
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
