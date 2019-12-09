@extends('layout.app')

@section('content')
<h2>Acceleration</h2>
 @foreach ($accelerations as $acceleration)
    {{$acceleration->x}}

    @endforeach

@endsection