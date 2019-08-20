<?php

Route::middleware('auth')->namespace('Admin')->group(function() {

Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::post('posts/store', 'PostController@store')->name('posts.store');
Route::get('posts', 'PostController@index')->name('posts.index');


// Edit article
Route::get('posts/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::put('post/{id}/update', 'PostController@update')->name('posts.update');


// supprimer un article

Route::get('posts/{id}/destroy', 'PostController@destroy')->name('posts.destroy');
});



Route::resource('pages', 'Admin\PageController');








Route::get('/a-propos', function () {
    return view('a-propos');

});

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/contact', 'HomeController@contact')->name('contact');



Route::get('/article/{id}', 'PostController@article')->name('article');


Route::get('/category/{title}', 'PostController@category')->name('category');


Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('gitublog');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/', 'PostController@articles')->name('articles');


Auth::routes();



