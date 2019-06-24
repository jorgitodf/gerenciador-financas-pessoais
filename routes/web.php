<?php

Auth::routes();

Route::get('/', ['as'=>'home', 'uses'=>'Home\HomeController@index'])->middleware('auth');

Route::get('/bancos', ['as'=>'bancos', 'uses'=>'Banco\BancoController@index'])->middleware('auth');
Route::get('/banco/create', ['as'=>'banco.novo', 'uses'=>'Banco\BancoController@create'])->middleware('auth');
Route::post('/banco/store', ['as'=>'banco.salvar', 'uses'=>'Banco\BancoController@store'])->middleware('auth');
Route::get('/banco/edit/{id}', ['as'=>'banco.editar', 'uses'=>'Banco\BancoController@edit'])->middleware('auth');
Route::post('/banco/update', ['as'=>'banco.atualizar', 'uses'=>'Banco\BancoController@update'])->middleware('auth');

Route::get('/categorias', ['as'=>'categorias', 'uses'=>'Categoria\CategoriaController@index'])->middleware('auth');
Route::get('/categoria/create', ['as'=>'categoria.novo', 'uses'=>'Categoria\CategoriaController@create'])->middleware('auth');
Route::post('/categoria/store', ['as'=>'categoria.salvar', 'uses'=>'Categoria\CategoriaController@store'])->middleware('auth');
Route::get('/categoria/edit/{id}', ['as'=>'categoria.editar', 'uses'=>'Categoria\CategoriaController@edit'])->middleware('auth');
Route::post('/categoria/update', ['as'=>'categoria.atualizar', 'uses'=>'Categoria\CategoriaController@update'])->middleware('auth');

Route::get('/bandeiras', ['as'=>'bandeiras', 'uses'=>'Bandeira\BandeiraCartaoController@index'])->middleware('auth');
Route::get('/bandeira/create', ['as'=>'bandeira.novo', 'uses'=>'Bandeira\BandeiraCartaoController@create'])->middleware('auth');
Route::post('/bandeira/store', ['as'=>'bandeira.salvar', 'uses'=>'Bandeira\BandeiraCartaoController@store'])->middleware('auth');
Route::get('/bandeira/edit/{id}', ['as'=>'bandeira.editar', 'uses'=>'Bandeira\BandeiraCartaoController@edit'])->middleware('auth');
Route::post('/bandeira/update', ['as'=>'bandeira.atualizar', 'uses'=>'Bandeira\BandeiraCartaoController@update'])->middleware('auth');

Route::get('/cartoes', ['as'=>'cartoes', 'uses'=>'Cartao\CartaoController@index'])->middleware('auth');
Route::get('/cartao/create', ['as'=>'cartao.novo', 'uses'=>'Cartao\CartaoController@create'])->middleware('auth');
Route::post('/cartao/store', ['as'=>'cartao.salvar', 'uses'=>'Cartao\CartaoController@store'])->middleware('auth');
Route::get('/cartao/edit/{id}', ['as'=>'cartao.editar', 'uses'=>'Cartao\CartaoController@edit'])->middleware('auth');
Route::post('/cartao/update', ['as'=>'cartao.atualizar', 'uses'=>'Cartao\CartaoController@update'])->middleware('auth');

Route::get('/tipo-contas', ['as'=>'tipo-contas', 'uses'=>'TipoConta\TipoContaController@index'])->middleware('auth');
Route::get('/tipo-conta/create', ['as'=>'tipo-conta.novo', 'uses'=>'TipoConta\TipoContaController@create'])->middleware('auth');
Route::post('/tipo-conta/store', ['as'=>'tipo-conta.salvar', 'uses'=>'TipoConta\TipoContaController@store'])->middleware('auth');
Route::get('/tipo-conta/edit/{id}', ['as'=>'tipo-conta.editar', 'uses'=>'TipoConta\TipoContaController@edit'])->middleware('auth');
Route::post('/tipo-conta/update', ['as'=>'tipo-conta.atualizar', 'uses'=>'TipoConta\TipoContaController@update'])->middleware('auth');

Route::get('/contas', ['as'=>'contas', 'uses'=>'Conta\ContaController@index'])->middleware('auth');
Route::get('/conta/create', ['as'=>'conta.novo', 'uses'=>'Conta\ContaController@create'])->middleware('auth');
Route::post('/conta/store', ['as'=>'conta.salvar', 'uses'=>'Conta\ContaController@store'])->middleware('auth');
Route::get('/conta/edit/{id}', ['as'=>'conta.editar', 'uses'=>'Conta\ContaController@edit'])->middleware('auth');
Route::post('/conta/update', ['as'=>'conta.atualizar', 'uses'=>'Conta\ContaController@update'])->middleware('auth');
Route::get('/conta/debitar', ['as'=>'conta.debitar', 'uses'=>'Conta\ContaController@debitar'])->middleware('auth');
Route::get('/conta/creditar', ['as'=>'conta.creditar', 'uses'=>'Conta\ContaController@creditar'])->middleware('auth');
Route::post('/conta/credit', ['as'=>'conta.credit', 'uses'=>'Conta\ContaController@credit'])->middleware('auth');
Route::post('/conta/debit', ['as'=>'conta.debit', 'uses'=>'Conta\ContaController@debit'])->middleware('auth');
Route::get('/conta/list/{id}', ['as'=>'conta.list', 'uses'=>'Conta\ContaController@list'])->middleware('auth');

Route::get('/pagamentos', ['as'=>'pagamentos', 'uses'=>'Pagamento\PagamentoAgendadoController@index'])->middleware('auth');
Route::get('/pagamento/create', ['as'=>'pagamento.novo', 'uses'=>'Pagamento\PagamentoAgendadoController@create'])->middleware('auth');
Route::post('/pagamento/store', ['as'=>'pagamento.salvar', 'uses'=>'Pagamento\PagamentoAgendadoController@store'])->middleware('auth');
Route::get('/pagamento/edit/{id}', ['as'=>'pagamento.editar', 'uses'=>'Pagamento\PagamentoAgendadoController@edit'])->middleware('auth');
Route::get('/pagamento/destroy/{id}', ['as'=>'pagamento.apagar', 'uses'=>'Pagamento\PagamentoAgendadoController@destroy'])->middleware('auth');
Route::post('/pagamento/update', ['as'=>'pagamento.atualizar', 'uses'=>'Pagamento\PagamentoAgendadoController@update'])->middleware('auth');
Route::post('/pagamento/verificar', ['as'=>'pagamento.verificar', 'uses'=>'Pagamento\PagamentoAgendadoController@verificar'])->middleware('auth');

Route::get('/extrato', ['as'=>'extrato', 'uses'=>'Extrato\ExtratoController@index'])->middleware('auth');

Route::get('/despesa-cartao/create', ['as'=>'despesa-cartao.novo', 'uses'=>'DespesaCartao\DespesaCartaoController@create'])->middleware('auth');
Route::post('/despesa-cartao/store', ['as'=>'despesa-cartao.salvar', 'uses'=>'DespesaCartao\DespesaCartaoController@store'])->middleware('auth');

Route::get('/fatura/create', ['as'=>'fatura.novo', 'uses'=>'Fatura\FaturaCartaoController@create'])->middleware('auth');
Route::post('/fatura/store', ['as'=>'fatura.salvar', 'uses'=>'Fatura\FaturaCartaoController@store'])->middleware('auth');
Route::get('/fatura/pay', ['as'=>'fatura.pagar', 'uses'=>'Fatura\FaturaCartaoController@pay'])->middleware('auth');
Route::get('/fatura/payment/{id}', ['as'=>'fatura.fechar', 'uses'=>'Fatura\FaturaCartaoController@payment'])->middleware('auth');
Route::post('/fatura/quitar', ['as'=>'fatura.quitar', 'uses'=>'Fatura\FaturaCartaoController@quitar'])->middleware('auth');


