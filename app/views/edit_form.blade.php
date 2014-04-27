@extends('layout')

@section('content')

<!--could do it like this? http://laravel.com/docs/html#form-model-binding -->

<!-- POST to EDIT/id
title
content
draft
-->
<h3>Edit form laravel styled</h3>
{{ Form::open(array('url' => 'edit/'.$data["id"])) }}

	{{Form::label('draft_checkbox', 'Draft')}}
	{{ Form::checkbox('draft', '1', true) }}
	</br>
	{{Form::label('title', 'Title')}}
	{{Form::text('title')}}
	
	{{Form::label('content', 'Content')}}
	{{Form::textarea('content')}}
	
	{{Form::submit('save', array('class' => 'button'))}}
{{ Form::close() }}

<h3>Edit form old</h3>

<form action= "/laravel_stuff/laravel_blog/public/edit/{{$data['id']}}" method="POST">
	<input name="draft_check" type="checkbox"><label for="checkbox1">Draft</label>
	<label>Title:
		<input type="text" name="title" value="{{{$data['title']}}}"/>
	</label></br>
	<label>Content:
		<textarea type="textarea" name="content">{{{$data['content']}}}</textarea>
	</label>
	</br>
	
	<input type="submit" class="button" value="Save" />

</form>
 
@stop