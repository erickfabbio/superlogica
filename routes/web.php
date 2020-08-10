<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Http;

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
    return view('index');
});

Route::group(["prefix" => "pessoas"], function(){
    Route::get("/", "PessoaController@index");
    Route::get("/novo", "PessoaController@novoView");
    Route::get("/{id}/editar", "PessoaController@editarView");
    Route::get("/{id}/excluir", "PessoaController@excluirView");
    Route::get("/{id}/destroy", "PessoaController@destroy");
    Route::post("/store", "PessoaController@store");
    Route::post("/update", "PessoaController@atualizar");
});

Route::group(["prefix" => "imoveis"], function(){
    Route::get("/", "ImovelController@index");
    Route::get("/novo", "ImovelController@novoView");
    Route::get("/{id}/editar", "ImovelController@editarView");
    Route::get("/{id}/excluir", "ImovelController@excluirView");
    Route::get("/{id}/destroy", "ImovelController@destroy");
    Route::post("/store", "ImovelController@store");
    Route::post("/update", "ImovelController@atualizar");
});
