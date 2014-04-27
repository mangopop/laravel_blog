@extends('layout')
@section('content')

{{ Form::open(array('url' => 'login')) }}

	{{ $errors->first('name') }}
	{{ $errors->first('password') }}
	
	{{Form::label('name', 'username')}}
	{{Form::text('name')}}
	
	{{Form::label('password', 'Password')}}
	{{Form::password('password')}}
	
	{{Form::submit('Blog away!')}}
{{ Form::close() }}

@stop
