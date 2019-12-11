<?php

namespace App\Http\Controllers;

use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map()
    {
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '400px';

        $gmap = new GMaps();
        $gmap->initialize($config);

        $marker['position'] = 'Sydney Airport,Sydney';
        $marker['infowindow_content'] = 'Sydney Airport,Sydney';

        $gmap->add_marker($marker);
        $map = $gmap->create_map();
        return view('map', compact('map'));
    }
}
