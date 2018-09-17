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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category','CategoryController');

Route::get('profile', function(){
    return view('profile');
});

Route::get('/cariin/user','CariinController@userIndex');
Route::post('/cariin/user/store','CariinController@userStore');
Route::post('/cariin/user/update','CariinController@userUpdate');
Route::get('/cariin/user/edit','CariinController@userEdit');
Route::get('/cariin/user/delete','CariinController@userDelete');

Route::post('/api/cariin/user/register', 'CariinApiController@register');
Route::post('/api/cariin/user/login', 'CariinApiController@login');
Route::get('/api/cariin/user/confirm_email', 'CariinApiController@confirmEmail');

Route::post('/api/cariin/recipe/add', 'CariinApiController@addRecipe');
Route::get('/api/cariin/recipe', 'CariinApiController@getRecipe');
Route::put('/api/cariin/recipe/update/{id?}', 'CariinApiController@updateRecipe');
Route::delete('/api/cariin/recipe/delete/{id?}', 'CariinApiController@deleteRecipe');
// Route::get('/api/cariin/recipe/{id}', function(){
//     return 'asdsa';
// });
// Route::get('/api/cariin/user/cuk', function(){
//     return 'asdsadas';
// });

// /* View Composer*/
// View::composer(['*'], function($view){
    
//     $user = Auth::user();
//     $view->with('user',$user);
    

    

// });

