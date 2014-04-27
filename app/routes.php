<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('blogs');
	//$blog= new Blog;
});

Route::get('login', function()
{
	return View::make('login');
	//$blog= new Blog;
});

Route::get('pass', function()
{
	$entry = new User;
	$entry->password = Hash::make('test');
	$entry->email = "simon.norton@gmail.com";
	$entry->name = "simon";
	$entry->save();
});

Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('blogs')->with('message', 'you are logged out');
	
});


Route::post('login', function()
{
	$rules = array(
		'name'    => 'required', 
		'password' => 'required' 
	);

	// run the validation rules on the inputs from the form
	$validator = Validator::make(Input::all(), $rules);

	// if the validator fails, redirect back to the form
	if ( $validator->fails() ) {
		return Redirect::to('login')
			->withErrors($validator) // send back all errors to the login form
			->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
	} else {

	// create user data for the authentication
	$userdata = array(
		'name' 	=> Input::get('name'),
		'password' 	=> Input::get('password')
	);

	if ( Auth::attempt($userdata) )
	{
	    //return Redirect::intended('dashboard');	
		//return with flash message
		return Redirect::to('blogs')
		->with('message', 'login successful');
	}else{
		return Redirect::to('login')
		->with('message', 'Your username/password combination was incorrect.')->withInput();
	}
	
}
});

/************ 
FORMS
*************/

//NOTE:get is where you are going. make is the view to load

//can also use ->before('auth') after the get method
Route::get('blog_form', array('before' => 'auth', function()
{
    return View::make('blog_form');
}));

//handle edit
//POST send $title $content
Route::post('edit_form', function()
{
	$id = Input::get('id');
	$title = Input::get('title');
	$content = Input::get('content');
	
	$data = array("id" => $id, "title" => $title, "content" => $content);

	//fill with content
	return View::make('edit_form')->with('data', $data);
});



/************ 
CRUD routes
*************/

//CREATE and display blogs
Route::post('blogs', array('before' => 'csrf', function()
{
	//this is an array
    //$data = Input::all();
	
	//use isset if to check if checkbox has been set and provide default value if not
	//or use laravel default shortcut

	$entry = New Blog;
    $entry->title = Input::get('title');
    $entry->copy = Input::get('content');
	$entry->draft = Input::get('draft_check', '0');	
	$entry->save();
	//return a make view didn't work???
	return Redirect::to('blogs');

}));

//read
Route::get('blogs/{id?}', function($id = null)
{

	if($id !== null){
		//want to display title and copy that matches id
		//could pass ID and BLOGS over and use it to get title and copy
		//or do logic here and pass over correct blog and title
		$title = Blog::find($id)->title;
		$copy = Blog::find($id)->copy;
		$id = Blog::find($id)->id;
		return View::make('blogs', array('title' => $title, 'copy' => $copy, 'id' => $id));
	}
	
	//this is an array
    $blogs = Blog::all();

	//makes a blog page, then sends a name pair to the page for the view to use.
    return View::make('blogs')->with('blogs', $blogs);
});

//update edit with form details 
//POST recieve: $title $content
//RESTfull recieve: $id
Route::POST('edit/{id}', array('before' => 'csrf', function($id)
{
	$title = Input::get('title');
	$content = Input::get('content');
	
	$blog = Blog::find($id);
	
	$blog->title = $title;
	$blog->copy = $content;
	
	$blog->save();
	
	return Redirect::to('blogs');
	//update() is used on a where clause only?	
}));


//post with delete doesn't work, general post does though?
//this is not RESTful, see edit closure
Route::post('delete', function()
{
	$id =Input::get('id');
	//return $id;
	Blog::destroy($id);
	return Redirect::to('blogs');
});


/************ 
SEARCH
*************/

Route::post('search', function()
{
	$search = Input::get('search');	
	
	//returned (this is important as returned will return things it's own way)
	//this will return all columns, I just need title.
	//officially called a 'model cotaining a single model instance'
	$result = Blog::where( 'title',  'LIKE', '%'.$search.'%')->get();
	/****** must figure this out ********/ //need to handle data efficiently
	//BUILD SOME TESTS TRYING TO DO THIS EVERY WAY I CAN THINK OF FOR REFERENCE AND PRACTISE!
	return View::make('search')->with('result', $result);
});


// Route::get('users', function()
// {
//   	//return View::make('users');
//     $users = User::all();
// 
//     return View::make('users')->with('users', $users);
// });

/*Route::any('crap', array('as' => 'test', function()
{
	//return "Should I only be calling the model and passing it to the view?"
}));*/