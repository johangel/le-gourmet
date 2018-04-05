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
  if(Auth::check()){return view('./recipe/home');}else{return view('./auth/login');}
});
Route::get('/register', function () {
    return view('./auth/register');
});
Route::get('/home', function () {
    return view('./recipe/home');
});

Route::get('/receta', function(){
  return view('./recipe/vistaReceta');
});

Route::resource('User','UserController');
Route::post('/recipe/guardar-receta','RecipeController@store');//Guarda recetas
Route::resource('recipe', 'RecipeController');
Route::get('recipee', 'RecipeController@getRecipes'); //devuelve todas las recetas de la BD en home.
Route::get('/PersonalRecipes/{name}', 'RecipeController@getRecipesProfile'); //devuelve todas las recetas de la BD en home.
Route::get('/Userdata/{name}', 'UsuarioDatosController@get');//Devuelve informacion personal al visitar un perfil
Route::post('Userdata/update/{id}', 'UsuarioDatosController@actualizar'); //envia datos del from a la BD para actualizar usuario
Route::get('/eliminarReceta/{id}', 'RecipeController@eliminarReceta');
Route::get('/GetReceta/{id}', 'RecipeController@CagrgarReceta');
Route::post('/EnviarComentario', 'ComentarioRecetaController@EnviarComentario');
Route::get('/CargarComentarios/{id}', 'ComentarioRecetaController@CargarComentarios');
Route::post('/EnviarVoto', 'votosController@enviarVoto');
Route::get('/UserData2/{name}', 'UsuarioDatosController@get2');
Route::post('editarReceta/{id}, RecipeController@editar');
Auth::routes();
