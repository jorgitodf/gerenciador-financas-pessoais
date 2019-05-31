<?php

namespace App\Http\Controllers\Banco;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Http\Requests\BankRequest;

class BancoController extends Controller
{
    protected $model;

    public function __construct(Bank $banco, Request $request)
    {
        $this->model = $banco;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancos = $this->model::all();
        return view('banco.index', compact('bancos'));
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $legend = "Cadastro de Banco";
        return view('banco.create', compact('legend'));
    }

    /**
     * Armazenar um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $dados = $request->all();
        $this->model::create($dados);
        return redirect()->route('bancos');
        /* 
        if (!empty($dados['cod_banco']) || !empty($dados['nome_banco'])) {
            $this->model::create($dados);
            return redirect()->route('bancos');
        } */

        //return view('banco.create');
       
    }

    /**
     * Show the form for editing the specified resource / Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legend = "Edição de Banco";
        $banco = $this->model::find($id);
        return view('banco.edit', compact('banco', 'legend'));
    }

    /**
     * Update the specified resource in storage / Atualizar o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dados = $request->all();

        $this->model::find($dados['cod_banco'])->update($dados);
        return redirect()->route('banco');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
