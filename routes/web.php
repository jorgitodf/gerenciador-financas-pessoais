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

Route::get('/tipo-contas', ['as'=>'tipo-contas', 'uses'=>'TipoConta\TipoContaController@index']);
Route::get('/tipo-conta/create', ['as'=>'tipo-conta.novo', 'uses'=>'TipoConta\TipoContaController@create']);
Route::post('/tipo-conta/store', ['as'=>'tipo-conta.salvar', 'uses'=>'TipoConta\TipoContaController@store']);
Route::get('/tipo-conta/edit/{id}', ['as'=>'tipo-conta.editar', 'uses'=>'TipoConta\TipoContaController@edit']);
Route::post('/tipo-conta/update', ['as'=>'tipo-conta.atualizar', 'uses'=>'TipoConta\TipoContaController@update']);

Route::get('/contas', ['as'=>'contas', 'uses'=>'Conta\ContaController@index']);
Route::get('/conta/create', ['as'=>'conta.novo', 'uses'=>'Conta\ContaController@create']);
Route::post('/conta/store', ['as'=>'conta.salvar', 'uses'=>'Conta\ContaController@store']);
Route::get('/conta/edit/{id}', ['as'=>'conta.editar', 'uses'=>'Conta\ContaController@edit']);
Route::post('/conta/update', ['as'=>'conta.atualizar', 'uses'=>'Conta\ContaController@update']);
Route::get('/conta/debitar', ['as'=>'conta.debitar', 'uses'=>'Conta\ContaController@debitar']);
Route::get('/conta/creditar', ['as'=>'conta.creditar', 'uses'=>'Conta\ContaController@creditar']);
Route::post('/conta/credit', ['as'=>'conta.credit', 'uses'=>'Conta\ContaController@credit']);
Route::post('/conta/debit', ['as'=>'conta.debit', 'uses'=>'Conta\ContaController@debit']);

Route::get('/pagamentos', ['as'=>'pagamentos', 'uses'=>'Pagamento\PagamentoAgendadoController@index']);
Route::get('/pagamento/create', ['as'=>'pagamento.novo', 'uses'=>'Pagamento\PagamentoAgendadoController@create']);
Route::post('/pagamento/store', ['as'=>'pagamento.salvar', 'uses'=>'Pagamento\PagamentoAgendadoController@store']);
Route::get('/pagamento/edit/{id}', ['as'=>'pagamento.editar', 'uses'=>'Pagamento\PagamentoAgendadoController@edit']);
Route::get('/pagamento/destroy/{id}', ['as'=>'pagamento.apagar', 'uses'=>'Pagamento\PagamentoAgendadoController@destroy']);
Route::post('/pagamento/update', ['as'=>'pagamento.atualizar', 'uses'=>'Pagamento\PagamentoAgendadoController@update']);

Route::get('/extrato', ['as'=>'extrato', 'uses'=>'Extrato\ExtratoController@index']);

Route::get('/despesa-cartao/create', ['as'=>'despesa-cartao.novo', 'uses'=>'DespesaCartao\DespesaCartaoController@create']);
Route::post('/despesa-cartao/store', ['as'=>'despesa-cartao.salvar', 'uses'=>'DespesaCartao\DespesaCartaoController@store']);

Route::get('/fatura/create', ['as'=>'fatura.novo', 'uses'=>'Fatura\FaturaCartaoController@create']);
Route::post('/fatura/store', ['as'=>'fatura.salvar', 'uses'=>'Fatura\FaturaCartaoController@store']);
