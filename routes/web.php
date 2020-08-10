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

Route::group(["prefix" => "proprietarios"], function(){
    Route::get("/", "ProprietarioController@index");
    Route::get("/novo", "ProprietarioController@novoView");
    Route::get("/{id}/editar", "ProprietarioController@editarView");
    Route::get("/{id}/excluir", "ProprietarioController@excluirView");
    Route::get("/{id}/destroy", "ProprietarioController@destroy");
    Route::post("/store", "ProprietarioController@store");
    Route::post("/update", "ProprietarioController@atualizar");
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
