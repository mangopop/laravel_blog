@extends('layout')

@section('content')

<!-- POST to BLOGS
title
content
draft
-->

<h4>Create blog entry</h4>

<form action= "/laravel_stuff/laravel_blog/public/blogs" method="POST">
	<label>Title:
		<input type="text" name="title" />
	</label>

	<label>Content:
		<textarea rows="7" name="content"></textarea>
	</label>
	
	<label>Summary:
		<input type="text" name="summary" />
	</label>
	
		<input name="draft_check" id="draft_check" checked="true" type="checkbox"><label for="checkbox1">Draft</label>

		<input type="submit" class="button radius" value="Create" />
		{{ Form::token() }}
</form>
 
@stop