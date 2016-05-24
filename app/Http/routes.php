<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['web']], function() {
	/*Front-end Routes*/
	Route::get('/',['as' => 'blog.index', 'uses' => 'PostController@getBLogIndex']);
	Route::get('/blog',['as' => 'blog.index', 'uses' => 'PostController@getBlogIndex']);
	Route::get('/blog/{post_id}&{end}',['as' => 'blog.single', 'uses' => 'PostController@getSinglePost']);
	/* Other Routes*/
	Route::get('/about', function() {
		return view('frontend.other.about');
	})->name('about');
	Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactMessageController@getContactIndex']);
	/*Control Panel Route*/
	Route::group(['prefix' => '/admin'], function() {
		Route::get('/',['as' => 'admin.index', 'uses' => 'AdminController@getIndex']);
		Route::get('/blog/posts',['as' => 'admin.blog.index', 'uses' => 'PostController@getPostIndex']);
		/*Post*/
		Route::get('/blog/post/{post_id}&{end}',['as' => 'admin.blog.post', 'uses' => 'PostController@getSinglePost']);
		Route::get('/blog/posts/create',['as' => 'admin.blog.create_post', 'uses' => 'PostController@getCreatePost']);
		Route::post('/blog/admin/post/create',['as' => 'admin.blog.post.create', 'uses' => 'PostController@postCreatePost']);
		Route::get('/blog/post/{post_id}/edit',['as' => 'admin.blog.post.edit', 'uses' => 'PostController@getUpdatepost']);
		Route::post('/blog/post/update',['as' => 'admin.blog.post.update', 'uses' => 'PostController@postUpdatepost']);
		Route::get('/blog/post/{post_id}/delete',['as' => 'admin.blog.post.delete', 'uses' => 'PostController@getDeletePost']);
		/*Category*/
		Route::get('/blog/categories',['as' => 'admin.blog.categories', 'uses' => 'CateController@getCategoryIndex']);
		Route::post('/blog/category/create',['as' => 'admin.blog.category.create', 'uses' => 'CateController@postCreateCategory']);
		Route::post('/blog/categories/update',['as' => 'admin.blog.category.update', 'uses' => 'CateController@postUpdateCategory']);
		Route::get('/blog/category/{category_id}/delete',['as' => 'admin.blog.category.delete', 'uses' => 'CateController@getDeleteCategory']);
	});
});