<?php

namespace App\Http\Controllers\Fatura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CreditCard;
use App\Models\InvoiceCard;
use App\Models\ScheduledPayment;
use App\Validations\ValidationFaturaCartao;
use App\HelperFormatters\Helpers;
use Illuminate\Support\Facades\DB;

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
        $error = $this->validations->validateGerarFaturaCartao($dados);

        if (!$error) {
            try {
                $dados['pago'] = "N";
                $dados['ano_mes_ref'] = Helpers::defineMesReferencia();
                $this->model::create($dados);
                return response()->json(['success' => 'Fatura Gerada com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage(); 
            }
        }

        return response()->json(['error' => $error], 500);
    }

    public function pay()
    {
        $legend = "Faturas de Cartão de Crédito em Aberto";
        $faturas = $this->model::where('pago', 'N')->get();
        $msg = "Não há Nenhuma Fatura em Aberta no Momento!";
        return view('fatura.pay', compact('legend', 'faturas', 'msg'));
    }

    public function payment($id)
    {
        $legend = "Pagamento Fatura Cartão de Crédito";
        $total = 0;
        $fatura = $this->model::find($id);

        $despesas = DB::table('expenditure_installments AS ei')
                    ->join('expense_cards AS ex', 'ex.id', '=', 'ei.expense_card_id')
                    ->join('credit_cards AS cc', 'cc.id', '=', 'ex.credit_card_id')
                    ->join('invoice_cards AS ic', 'ic.credit_card_id', '=', 'cc.id')
                    ->select('ei.id', 'ex.data_compra', 'ex.descricao', 'ei.numero_parcela', 'ei.valor', 'ex.credit_card_id')
                    ->where('ic.id', '=',  $id)
                    ->where('ei.data_pagamento', '=', $fatura->data_pagamento_fatura)
                    ->orderBy('ex.data_compra')
                    ->get();
        foreach ($despesas as $desp) {
            $total = $total + $desp->valor;
        }    

        
        $restante = $this->model::where('pago', 'S')->where('credit_card_id', $despesas[0]->credit_card_id)->select('restante_fatura_mes_anterior')->orderBy('id', 'DESC')->take(1)->get();

        return view('fatura.fechar', compact('legend', 'despesas', 'total', 'fatura', 'restante'));
    }

    public function quitar(Request $request, ScheduledPayment $scheduledPayment)
    {
        $dados = $request->all();
        $error = $this->validations->validateQuitarFaturaCartao($dados);

        if (!$error) { 
            try {
                $dados['restante_fatura_mes_anterior'] = (Helpers::formatarMoeda($dados['valor_total_fatura']) - Helpers::formatarMoeda($dados['valor_pagamento_fatura']));
                $dados['ano_mes_ref'] = Helpers::defineMesReferencia();
                $dados['data_fechamento_fatura'] = date ("Y-m-d");
                $dados['pago'] = "S";

                $this->model::find($dados['id'])->update($dados);

                $return = $scheduledPayment->cardPaymentSchedule($dados);

                if ($return == true) {
                    return response()->json(['success' => 'Fatura Paga com Sucesso!', 'base_url' => url('')], 201);
                } else {
                    $error['error_create'] = $return;
                    return response()->json(['error' => $error], 500);
                    die();
                }

            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage(); 
            } 
        }

        return response()->json(['error' => $error], 500);
    }

    public function update(Request $request, $id)
    {
        //
    }

}
