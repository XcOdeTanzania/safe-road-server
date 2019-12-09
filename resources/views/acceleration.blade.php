@extends('layout.app')

@section('content')

<h2>Acceleration</h2>
<table class="table">
     <thead>
    <tr >
        <th scope="col" style="background-color: DodgerBlue">id</th>
        <th scope="col" style="background-color: MediumSeaGreen">X m/s2</th>
        <th scope="col" style="background-color: DodgerBlue">Y  m/s2</th>
        <th scope="col" style="background-color: MediumSeaGreen">Z  m/s2</th>
    </tr>
    </thead>
<tbody>
@foreach ($accelerations as $acceleration)
   <tr >
       
        <td style="background-color: lightBlue">{{$acceleration->id}}</td>
        <td style="background-color: lightGreen">{{$acceleration->x}}</td>
        <td style="background-color: lightBlue">{{$acceleration->y}}</td>
        <td style="background-color: lightGreen">{{$acceleration->z}}</td>
    </tr>

@endforeach
</tbody>
</table>
@endsection