@extends('layout')

@section('content')

	@foreach($users as $user)
    	<p>{{ $user->name }}</p>
	@endforeach
 	<a href="{{ url('blogs') }}">My Blog</a>;
@stop