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
    return view('./auth/login');
});
Route::get('/register', function () {
    return view('./auth/register');
});
Route::get('/home', function () {
    return view('./recipe/home');
});
Route::resource('User','UserController');
Route::post('/recipe/guardar-receta','RecipeController@store');
Route::resource('recipe', 'RecipeController');
Route::get('recipee', 'RecipeController@getRecipes');
Route::post('upload', 'UploadController@upload');
Auth::routes();
