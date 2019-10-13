<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'home' 
]);

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/results', function(){
    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();
    return view('results')->with('title',request('query'))
                        ->with('tags',\App\Tag::all())
                        ->with('posts',$posts)
                        ->with('settings',\App\Setting::first())
                        ->with('categories',\App\Category::all());
});
Auth::routes();

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::post('users', 'HomeController@users')->name('users');

    Route::get('users', 'HomeController@getUsers')->name('get-user');
    
    Route::get('/post/index', [
        'uses' => 'PostsController@index',
        'as' => 'post.index'
    ]);

    Route::get('/post/trash', [
        'uses' => 'PostsController@trashed',
        'as' => 'post.trash'
    ]);

    Route::get('/post/create', [
                'uses' => 'PostsController@create',
                'as' => 'post.create'
    ]);

    Route::post('/post/create', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);
    
    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/categogry/index', [
        'uses' => 'CategoriesController@index',
        'as' => 'category.index'
    ]);

    Route::get('/categogry/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/categogry/create', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/categogry/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/categogry/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/categogry/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);


    Route::get('/tag/index', [
        'uses' => 'TagsController@index',
        'as' => 'tag.index'
    ]);

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/create', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/user/index', [
        'uses' => 'UsersController@index',
        'as' => 'user.index'
    ]);

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/create', [
        'uses' => 'UsersController@store',
        'as' => 'user.store' 
    ]);

    Route::get('/user/profile', [
        'uses' => 'ProfilesController@edit',
        'as' => 'user.profile'
    ]);

    Route::post('/user/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.update'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not_admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not_admin'
    ]);

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);
});