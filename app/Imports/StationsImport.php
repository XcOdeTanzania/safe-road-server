<?php

namespace App\Imports;

use App\Station;
use Maatwebsite\Excel\Concerns\ToModel;

class StationsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Station([
            'name'  => $row[0],
            'id_station'  => $row[1],
            'latitude'  => $row[2],
            'longitude'  => $row[3],
            'district'  => $row[4],
            'id_district'  => $row[5],
            'region'  => $row[6]
        ]);
    }
}
