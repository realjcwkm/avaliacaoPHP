<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastrardependente', function () {
    return view('cadastrarDependente');
});


Route::get('/pessoa/{id}', 'PessoaController@show');
Route::get('/pessoa/{id}/edit','PessoaController@edit');

//criar pessoa no server
Route::post('/pessoa', 'PessoaController@store');
//listar
Route::get('/pessoas', 'PessoaController@index');
//abrir o form para criar pessoa
Route::get('/pessoa', 'PessoaController@create');
Route::put('/pessoa/{id}', 'PessoaController@update');
//Route::get('/pessoa/id', 'PessoaController@index');
