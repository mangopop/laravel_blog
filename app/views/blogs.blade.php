@extends('layout')
@section('content')

<!--title / copy / id array items-->	
	@if(isset($title))
		<h2 class="text-center">{{ $title }}</h2>
		<div>{{ $copy }}</div>
		
		<!--delete form-->
		@if( Auth::check() )
		<form class="edit-blog left" action="{{ url ('/delete') }}" method="post" accept-charset="utf-8">
			<input type="submit" class="button" value="Delete">
			<input type="hidden" value="{{{$id}}}" name="id"/>
			<!--can delete like this. Can't remember the benefit thinks it's a restful thing-->
			<!--<input name="_method" type="hidden" value="DELETE">-->
		</form>
		@endif
		
		<!--edit form-->
		@if( Auth::check() )
		<form class="delete-blog left" action="{{ url ('/edit_form') }}" method="POST" accept-charset="utf-8">
			<input type="submit" class="button" value="Edit">
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
		@if($blog->draft == 0)	    	
			<div class="date">
				<p class="text-center">{{{date('M d',strtotime($blog->created_at))}}}</p>
				<p class="text-center">{{{date('Y',strtotime($blog->created_at))}}}</p>
			</div>
			<h2 class="text-center"><a href="blogs/{{{ $blog->id }}}">{{ $blog->title }}</a></h2>
			<p>{{ $blog->summary }}</p>
			<hr>
		@endif
		@endforeach
	@endif
 
@stop