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

Route::get('/bandeiras', ['as'=>'bandeiras', 'uses'=>'Bandeira\BandeiraCartaoController@index']);
Route::get('/bandeira/create', ['as'=>'bandeira.novo', 'uses'=>'Bandeira\BandeiraCartaoController@create']);
Route::post('/bandeira/store', ['as'=>'bandeira.salvar', 'uses'=>'Bandeira\BandeiraCartaoController@store']);
Route::get('/bandeira/edit/{id}', ['as'=>'bandeira.editar', 'uses'=>'Bandeira\BandeiraCartaoController@edit']);
Route::post('/bandeira/update', ['as'=>'bandeira.atualizar', 'uses'=>'Bandeira\BandeiraCartaoController@update']);

Route::get('/cartoes', ['as'=>'cartoes', 'uses'=>'Cartao\CartaoController@index']);
Route::get('/cartao/create', ['as'=>'cartao.novo', 'uses'=>'Cartao\CartaoController@create']);
Route::post('/cartao/store', ['as'=>'cartao.salvar', 'uses'=>'Cartao\CartaoController@store']);
Route::get('/cartao/edit/{id}', ['as'=>'cartao.editar', 'uses'=>'Cartao\CartaoController@edit']);
Route::post('/cartao/update', ['as'=>'cartao.atualizar', 'uses'=>'Cartao\CartaoController@update']);
