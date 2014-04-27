@extends('layout')

@section('content')

<!--could do it like this? http://laravel.com/docs/html#form-model-binding -->

<!-- POST to EDIT/id
title
content
draft
-->

<h3>Edit form</h3>

<form action= "/laravel_stuff/laravel_blog/public/edit/{{$data['id']}}" method="POST">
	
	<label>Title:
		<input type="text" name="title" value="{{$data['title']}}"/>
	</label></br>
	<label>Content:
		<textarea rows="10" columns="50" type="textarea" name="content">{{$data['content']}}</textarea>
	</label>
	</br>
	<input name="draft_check" type="checkbox"><label for="checkbox1">Draft</label>
	
	<input type="submit" class="button" value="Save" />

</form>
 
@stop