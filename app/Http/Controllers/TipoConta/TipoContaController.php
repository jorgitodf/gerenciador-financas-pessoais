<?php

namespace App\Http\Controllers\TipoConta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccountType;
use App\Validations\ValidationConta;

class TipoContaController extends Controller
{
    protected $model;
    private $validations;

    public function __construct(AccountType $tipo_conta, Request $request)
    {
        $this->model = $tipo_conta;
        $this->request = $request;
        $this->validations = new ValidationConta();
    }
    public function index()
    {
        $tipo_contas = $this->model::paginate(5);

        if ($tipo_contas->count() == 0) {
            $msg = "Nenhum Tipo de Conta Cadastrada no Sistema!";
        } else {
            $msg = "";
        }

        return view('tipo_conta.index', compact('tipo_contas', 'msg'));
    }

    public function create()
    {
        $legend = "Cadastro de Tipo de Conta";
        return view('tipo_conta.create', compact('legend'));
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
        $error = $this->validations->validateTipoConta($dados, $this->model);

        if (!$error) {
            $this->model::create($dados);
            return response()->json(['success' => 'Tipo de Conta Cadastrada com Sucesso!', 'base_url' => url('')], 201);
        }

        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
