<?php

Route::get('/', ['as'=>'home', 'uses'=>'Home\HomeController@index']);

Route::get('/bancos', ['as'=>'bancos', 'uses'=>'Banco\BancoController@index']);
Route::get('/banco/create', ['as'=>'banco.novo', 'uses'=>'Banco\BancoController@create']);
Route::post('/banco/store', ['as'=>'banco.salvar', 'uses'=>'Banco\BancoController@store']);
Route::get('/banco/edit/{id}', ['as'=>'banco.editar', 'uses'=>'Banco\BancoController@edit']);
Route::post('/banco/update', ['as'=>'banco.atualizar', 'uses'=>'Banco\BancoController@update']);

Route::get('/categorias', ['as'=>'categorias', 'uses'=>'Categoria\CategoriaController@index']);
Route::get('/categoria/create', ['as'=>'categoria.novo', 'uses'=>'Categoria\CategoriaController@create']);
Route::post('/categoria/store', ['as'=>'categoria.salvar', 'uses'=>'Categoria\CategoriaController@store']);
Route::get('/categoria/edit/{id}', ['as'=>'categoria.editar', 'uses'=>'Categoria\CategoriaController@edit']);
Route::post('/categoria/update', ['as'=>'categoria.atualizar', 'uses'=>'Categoria\CategoriaController@update']);
