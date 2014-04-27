@extends('layout')

@section('content')

<!-- POST to BLOGS
title
content
draft
-->

<h4>Create blog entry</h4>

<form action= "/laravel_stuff/laravel_blog/public/blogs" method="POST">
	<label>title:
		<input type="text" name="title" />
	</label>

	<label>content
		<input type="text" name="content" />
	</label>
		<input name="draft_check" value="1" type="checkbox"><label for="checkbox1">Draft</label>
		<input type="submit" class="button radius" value="Create" />

</form>
 
@stop