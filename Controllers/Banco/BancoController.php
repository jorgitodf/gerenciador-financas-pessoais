<?php

namespace App\Http\Controllers\Banco;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Validations\ValidationBanco;

class BancoController extends Controller
{
    protected $model;
    private $validations;

    public function __construct(Bank $banco, Request $request)
    {
        $this->model = $banco;
        $this->request = $request;
        $this->validations = new ValidationBanco();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancos = $this->model::paginate(10);

        if ($bancos->count() == 0) {
            $msg = "Nenhum Banco Cadastrado no Sistema!";
        } else {
            $msg = "";
        }

        return view('banco.index', compact('bancos', 'msg'));
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
    public function store(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateBanco($dados, $this->model);

        if (!$error) {
            try {
                $this->model::create($dados);
                return response()->json(['success' => 'Banco Cadastrado com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage();
            }
        }

        return response()->json(['error' => $error], 500);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $banco)
    {
        $dados = $request->all();

        try {
            $banco::find($dados['cod_banco'])->update($dados);
            return response()->json(['success' => 'Banco Alterado com Sucesso!', 'base_url' => url('')], 201);
        } catch (\Illuminate\Database\QueryException $ex) {
            $error['error_create'] = $ex->getMessage();
        }
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
