@extends('layout.app')

@section('content')
<h2>Gyroscope</h2>
<table class="table" >
     <thead>
    <tr >
        <th scope="col" style="background-color: DodgerBlue">id</th>
        <th scope="col" style="background-color: MediumSeaGreen">X m/s2</th>
        <th scope="col" style="background-color: DodgerBlue">Y  m/s2</th>
        <th scope="col" style="background-color: MediumSeaGreen">Z  m/s2</th>
    </tr>
    </thead>
<tbody>
 
@foreach ($gyroscopes as $gyroscope)
   <tr>
       <td style="background-color: lightblue">{{$gyroscope->id}}</td>
       <td style="background-color: lightgreen">{{$gyroscope->x}}</td>
       <td style="background-color: lightblue">{{$gyroscope->y}}</td>
       <td style="background-color: lightgreen">{{$gyroscope->z}}</td>
    </tr>

@endforeach
</tbody>
</table>
@endsection