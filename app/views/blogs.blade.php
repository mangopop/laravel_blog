@extends('layout')
@section('content')

<!--title / copy / id array items-->	
	@if(isset($title))
		<h1>{{{ $title }}}</h1>
		<p>{{{ $copy }}}</p>
		
		<!--delete form-->
		@if( Auth::check() )
		<form action="{{ url ('/delete') }}" method="post" accept-charset="utf-8">
			<p><input type="submit" class="button" value="Delete"></p>
			<input type="hidden" value="{{{$id}}}" name="id"/>
			<!--can delete like this. Can't remember the benefit thinks it's a restful thing-->
			<!--<input name="_method" type="hidden" value="DELETE">-->
		</form>
		@endif
		
		<!--edit form-->
		@if( Auth::check() )
		<form action="{{ url ('/edit_form') }}" method="POST" accept-charset="utf-8">
			<p><input type="submit" class="button" value="Edit"></p>
			<input type="hidden" value="{{{$id}}}" name="id"/>
			<input type="hidden" value="{{{$title}}}" name="title"/>
			<input type="hidden" value="{{{$copy}}}" name="content"/>
			<!--can delete like this. Can't remember the benefit thinks it's a restful thing-->
			<!--<input name="_method" type="hidden" value="DELETE">-->
		</form>
		@endif
		
	<!--has the blog model / collection-->
	@else
		@foreach($blogs as $blog)
		@if($blog->draft == 1)
	    	<h1><a href="blogs/{{{ $blog->id }}}">{{{ $blog->title }}}</a></h1>
			<p>{{{date('M d',strtotime($blog->created_at))}}}</p>
			<p>{{{date('Y',strtotime($blog->created_at))}}}</p>
			<p>{{{ $blog->copy }}}</p>
		@endif
		@endforeach
	@endif
 
@stop