<?php

namespace App\Http\Controllers\DespesaCartao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpenseCard;
use App\Models\CreditCard;
use App\Models\ExpenditureInstallment;
use App\Validations\ValidationDespesaCartao;
use App\HelperFormatters\Helpers;
use Illuminate\Support\Facades\DB;

class DespesaCartaoController extends Controller
{
    protected $model;
    private $validations;
    private $cartoes;
    private $parcelas;

    public function __construct(ExpenseCard $expenseCard, Request $request)
    {
        $this->model = $expenseCard;
        $this->request = $request;
        $this->validations = new ValidationDespesaCartao();
        $this->cartoes = new CreditCard();
        $this->parcelas = new ExpenditureInstallment();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $legend = "Despesa de Cartão de Crédito";
        $cartoes = $this->cartoes::all()->sortBy('numero_cartao');
        return view('despesa_cartao.create', compact('legend', 'cartoes'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateDespesaCartao($dados, $this->model, $tv = "create");

        $mes_atual = date('m', strtotime(date('Y-m-d')));
        $dia_compra = date('d', strtotime(Helpers::formataData($dados['data_compra'])));
        $mes_compra = date('m', strtotime(Helpers::formataData($dados['data_compra'])));
        $ano_compra = date('Y', strtotime(Helpers::formataData($dados['data_compra'])));

        if (!$error) {
            if ($dados['numero_parcela'] == 1) {

                try {

                    $dados['data_pagamento'] = Helpers::dataPagamento($dados['data_compra'] , $dados['credit_card_id']);

                    $id = $this->model::create($dados)->id;
                    $dados['expense_card_id'] = $id;

                    $this->parcelas::create($dados);
                    return response()->json(['success' => 'Despesa do Cartão Lançada com Sucesso!', 'base_url' => url('')], 201);

                } catch (\Illuminate\Database\QueryException $ex) {
                    $error['error_create'] = $ex->getMessage();
                }

            } else {
                $data = [];
                $qtd_parcelas = (int) $dados['numero_parcela'];

                try {

                    $id = $this->model::create($dados)->id;

                    for ($i = 1; $i <= $dados['numero_parcela']; $i++) {

                        $data[$i]['valor'] = Helpers::formatarMoeda($dados['valor']) / $qtd_parcelas;

                        if ($qtd_parcelas < 10) {
                            $data[$i]['numero_parcela'] = "0{$i}/0".$i;
                        } else {
                            $data[$i]['numero_parcela'] = "{$i}/{$i}";
                        }

                        if ($dados['credit_card_id'] == 1 && $dia_compra <= 26 & ($mes_compra == $mes_atual)) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-08")));
                        } else if ($dados['credit_card_id'] == 1 && $dia_compra <= 26 & ($mes_compra < $mes_atual)) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_atual}-08")));
                        } else if ($dados['credit_card_id'] == 1 && $dia_compra > 26) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-08")));

                        } else if ($dados['credit_card_id'] == 2 && $dia_compra <= 25 & ($mes_compra == $mes_atual)) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-08")));
                        } else if ($dados['credit_card_id'] == 2 && $dia_compra <= 25 & ($mes_compra < $mes_atual)) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_atual}-08")));
                        } else if ($dados['credit_card_id'] == 2 && $dia_compra > 25) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-08")));


                        } else if ($dados['credit_card_id'] == 3 && (($dia_compra >= 1 && $dia_compra <= 2) && ($mes_compra == $mes_atual))) {
                            $data[$i]['data_pagamento'] = date('09/m/Y');
                        } else if ($dados['credit_card_id'] == 3 && (($dia_compra > 2 && $dia_compra <= 31) && ($mes_compra == $mes_atual))) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-09")));
                        } else if ($dados['credit_card_id'] == 3 && (($dia_compra > 2 && $dia_compra <= 31) && ($mes_compra < $mes_atual))) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-09")));
                        } else if ($dados['credit_card_id'] == 3 && (($dia_compra > 2 && $dia_compra <= 31) && ($mes_compra > $mes_atual))) {
                            $data[$i]['data_pagamento'] = date('d/m/Y', strtotime("+{$i} month", strtotime("{$ano_compra}-{$mes_compra}-09")));
                        }

                        $data[$i]['expense_card_id'] = $id;

                    }

                    foreach ($data as $linha) {

                        DB::table('expenditure_installments')->insert(['valor' => number_format($linha['valor'], 2, '.', ''), 'numero_parcela'=> $linha['numero_parcela'],
                        'data_pagamento'=> Helpers::formataData($linha['data_pagamento']), 'expense_card_id'=> $linha['expense_card_id'], 'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')]);
                    }

                    return response()->json(['success' => 'Despesa do Cartão Lançada com Sucesso!', 'base_url' => url('')], 201);

                } catch (\Illuminate\Database\QueryException $ex) {
                    $error['error_create'] = $ex->getMessage();
                }
            }
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

    public function destroy($id)
    {
        //
    }
}
