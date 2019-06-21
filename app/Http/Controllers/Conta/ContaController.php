<?php

namespace App\Http\Controllers\Conta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccountType;
use App\Models\Bank;
use App\Models\Account;
use App\Models\Extract;
use App\Models\Categories;
use App\Validations\ValidationConta;
use App\Validations\ValidationDebitoCredito;
use App\HelperFormatters\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduledPayment;

class ContaController extends Controller
{
    protected $model;
    private $validations_cre_deb;
    private $validations;
    private $tipos_contas;
    private $bancos;

    public function __construct(Account $account, Request $request)
    {
        $this->model = $account;
        $this->request = $request;
        $this->validations = new ValidationConta();
        $this->validations_cre_deb = new ValidationDebitoCredito();
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

    public function list(Request $request, ScheduledPayment $scheduledPayment)
    {
        $id = $request->query('id');
        $user = Auth::user();

        if ($user->contas[0]->id == $id) {
            session(['id_conta' => $user->contas[0]->id]);
            return response()->json(['success' => 'ok', 'base_url' => url('')], 201);
        }

    }

    public function update(Request $request)
    {
        $dados = $request->where('tipo', 'C')->all();
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

    public function creditar()
    {
        $categories = new Categories();
        $categorias = $categories::all();
        return view('conta.creditar', compact('categorias'));
    }

    public function credit(Request $request)
    {
        $dados = $request->all();

        $extract = new Extract();
        $dados['account_id'] = 2;
        $dados['mes'] = Helpers::verificaMes();
        $dados['tipo_operacao'] = "Crédito";
        $dados['quantidade'] = 1;
        $dados['despesa_fixa'] = "N";
        $valor_saldo = $extract->getSaldo($dados['account_id']);

        if (!empty($valor_saldo[0]->saldo)) {
            $dados['saldo'] = ((double)$valor_saldo[0]->saldo + (double) Helpers::formatarMoeda($dados['valor']));
        } else {
            $dados['saldo'] = ((double) Helpers::formatarMoeda($dados['valor']) + 0.00);
        }
        $error = $this->validations_cre_deb->validateCredito($dados, $extract);

        if (!$error) {
            try {
                $extract::create($dados);
                return response()->json(['success' => 'Valor Creditado com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage();
            }
        }

        return response()->json(['error' => $error], 500);

    }

    public function debitar()
    {
        $categories = new Categories();
        $categorias = $categories::where('tipo', 'D')->get();
        return view('conta.debitar', compact('categorias'));
    }

    public function debit(Request $request)
    {
        $dados = $request->all();

        $extract = new Extract();
        $dados['account_id'] = 1;
        $dados['mes'] = Helpers::verificaMes();
        $dados['tipo_operacao'] = "Débito";
        $dados['quantidade'] = 1;
        $dados['despesa_fixa'] = "N";
        $valor_saldo = $extract->getSaldo($dados['account_id']);

        if (!empty($valor_saldo[0]->saldo)) {
            $dados['saldo'] = ((double)$valor_saldo[0]->saldo - (double) Helpers::formatarMoeda($dados['valor']));
        }
        $error = $this->validations_cre_deb->validateDebito($dados, $extract, $dados['account_id']);

        if (!$error) {
            try {
                $extract::create($dados);
                return response()->json(['success' => 'Valor Debitado com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage();
            }
        }

        return response()->json(['error' => $error], 500);

    }
}
