@extends('layout')
@section('content')

<!-- 
returning a TITLE as result from search
will need id
-->

<ul>
@foreach($result as $value)
	<li><a href="{{url('blogs', array($value->id))}}">{{{$value->title}}}</a></li>
@endforeach
</ul>

@stop