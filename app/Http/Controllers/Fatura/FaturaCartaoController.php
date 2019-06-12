<?php

namespace App\Http\Controllers\Fatura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CreditCard;
use App\Models\InvoiceCard;
use App\Validations\ValidationFaturaCartao;
use App\HelperFormatters\Helpers;

class FaturaCartaoController extends Controller
{
    protected $model;
    private $validations;
    private $cartoes;

    public function __construct(InvoiceCard $fatura, Request $request)
    {
        $this->model = $fatura;
        $this->request = $request;
        $this->validations = new ValidationFaturaCartao();
        $this->cartoes = new CreditCard();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $legend = "Gerar Fatura de Cartão de Crédito";
        $cartoes = $this->cartoes::all()->sortBy('numero_cartao');
        return view('fatura.create', compact('legend', 'cartoes'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateGerarFaturaCartao($dados, $this->model);

        if (!$error) {
            try {
                $dados['pago'] = "N";
                $this->model::create($dados);
                return response()->json(['success' => 'Fatura Gerada com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage(); 
            }
        }

        return response()->json(['error' => $error], 500);
    }

    public function show($id)
    {
        //
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
