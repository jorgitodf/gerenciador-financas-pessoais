<?php

namespace App\Http\Controllers\Cartao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CreditCard;
use App\Models\FlagCards;
use App\Models\Bank;
use App\Validations\ValidationCartaoCredito;

class CartaoController extends Controller
{
    protected $model;
    private $validations;
    private $bandeiras;
    private $bancos;

    public function __construct(CreditCard $creditCard, Request $request)
    {
        $this->model = $creditCard;
        $this->request = $request;
        $this->validations = new ValidationCartaoCredito();
        $this->bandeiras = new FlagCards();
        $this->bancos = new Bank();
    }

    public function index()
    {
        $cartoes = $this->model::orderBy('numero_cartao')->paginate(6);

        if ($cartoes->count() == 0) {
            $msg = "Nenhum Cartão de Crédito Cadastrado no Sistema!";
        } else {
            $msg = "";
        }

        return view('cartao.index', compact('cartoes', 'msg'));
    }

    public function create()
    {
        $legend = "Cadastro de Cartão de Crédito";
        $bandeiras = $this->bandeiras::all()->sortBy('bandeira');
        $bancos = $this->bancos::all()->sortBy('nome_banco');
        return view('cartao.create', compact('legend', 'bandeiras', 'bancos', 'cartao'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = 1;
        $error = $this->validations->validateCartao($dados, $this->model);

        if (!$error) {
            $this->model::create($dados);
            return response()->json(['success' => 'Cartão Cadastrado com Sucesso!', 'base_url' => url('')], 201);
        }

        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        $legend = "Edição de Cartão de Crédito";
        $cartao = $this->model::find($id);
        $bandeiras = $this->bandeiras::all()->sortBy('bandeira');
        $bancos = $this->bancos::all()->sortBy('nome_banco');
        return view('cartao.edit', compact('cartao', 'legend', 'bandeiras', 'bancos'));
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateCartao($dados, $this->model);

        if (!$error) {
            $this->model::find($dados['id_cartao'])->update($dados);
            return response()->json(['success' => 'Cartão Alterado com Sucesso!', 'base_url' => url('')], 201);
        }

        return response()->json(['error' => $error], 500);
    }

}
