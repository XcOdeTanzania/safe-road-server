@extends('layout.app')

@section('content')
<h2>Location</h2>
<table class="table" >
     <thead>
    <tr >
        <th scope="col" style="background-color: DodgerBlue">id</th>
        <th scope="col" style="background-color: MediumSeaGreen">Latitude</th>
        <th scope="col" style="background-color: DodgerBlue">Longitude</th>
        <th scope="col" style="background-color: MediumSeaGreen">speed  m/s2</th>
        <th scope="col" style="background-color: DodgerBlue">user ID </th>
    </tr>
    </thead>
<tbody>
@foreach ($locations as $location)
   <tr >
       
        <td style="background-color: lightBlue">{{$location->id}}</td>
        <td style="background-color: lightGreen">{{$location->x}}</td>
        <td style="background-color: lightBlue">{{$location->y}}</td>
        <td style="background-color: lightGreen">{{$location->z}}</td>
        <td style="background-color: lightBlue">{{$location->user_id}}</td>
    </tr>

@endforeach
</tbody>
</table>

@endsection