<?php

namespace App\Http\Controllers\Conta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccountType;
use App\Models\Bank;
use App\Models\Account;
use App\Validations\ValidationConta;

class ContaController extends Controller
{
    protected $model;
    private $validations;
    private $tipos_contas;
    private $bancos;

    public function __construct(Account $account, Request $request)
    {
        $this->model = $account;
        $this->request = $request;
        $this->validations = new ValidationConta();
        $this->tipos_contas = new AccountType();
        $this->bancos = new Bank();
    }

    public function index()
    {
        $contas = $this->model::orderBy('numero_conta')->paginate(6);

        if ($contas->count() == 0) {
            $msg = "Nenhuma Conta Cadastrada no Sistema!";
        } else {
            $msg = "";
        }

        return view('conta.index', compact('contas', 'msg'));
    }

    public function create()
    {
        $legend = "Cadastro de Conta";
        $tipos_contas = $this->tipos_contas::all()->sortBy('tipo_conta');
        $bancos = $this->bancos::all()->sortBy('nome_banco');
        return view('conta.create', compact('legend', 'bancos', 'tipos_contas'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = 1;
        $error = $this->validations->validateConta($dados, $this->model, $tv = "create");

        if (!$error) {
            try {
                $this->model::create($dados);
                return response()->json(['success' => 'Conta Cadastrada com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage(); 
            }
        }

        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        $legend = "Edição de Conta";
        $conta = $this->model::find($id);
        $tipos_contas = $this->tipos_contas::all()->sortBy('tipo_conta');
        $bancos = $this->bancos::all()->sortBy('nome_banco');
        return view('conta.edit', compact('conta', 'legend', 'tipos_contas', 'bancos'));
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateConta($dados, $this->model, $tv = "edit");

        if (!$error) {
            try {
                $this->model::find($dados['id_conta'])->update($dados);
                return response()->json(['success' => 'Conta Alterada com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage(); 
            }
        }

        return response()->json(['error' => $error], 500);
    }

}
