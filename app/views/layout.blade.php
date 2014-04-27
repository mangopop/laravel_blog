<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Foundation</title>
	<link rel="stylesheet" href="/laravel_stuff/laravel_blog/public/stylesheets/app.css" />
	<script src="/laravel_stuff/laravel_blog/public/bower_components/modernizr/modernizr.js"></script>
</head>

<body>
	<div class="row">
		<div class="small-12 columns">
			<h1>blog</h1>
			@if (Session::get('message'))
			<div>
				{{session::get('message')}}
			</div>
			@endif
			<ul>
				<!--using hand written url causes issues-->
				<li><a href="{{url('blogs')}}">Blogs</a></li>
				@if (Auth::check())
				<li><a href="{{url('blog_form')}}">New Entry</a></li>
				<li><a href="{{url('logout')}}">logout</a></li>
				@endif
			</ul>
		</div>
	</div><!--end row--> 

	<div class="row">
		<div class="small-12 medium-3 columns">
			<h4>Search blogs</h4>
			<form action="{{url('search')}}" method="POST" accept-charset="utf-8">
				<input type="text" placeholder="search blog" name="search"/>
				<input class="button" type="submit" value="Find"/>
			</form>
		</div>
		
		<div class="small-12 medium-6 columns">
			@yield('content')
		</div>
		
		<div class="small-12 medium-3 columns">
			<p>archive</p>
		</div>
	</div><!--end row-->    
</div>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/foundation/js/foundation.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
