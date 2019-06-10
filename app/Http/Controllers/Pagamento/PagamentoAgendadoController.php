<?php

namespace App\Http\Controllers\Pagamento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\ScheduledPayment;
use App\Validations\ValidationPagamentoAgendado;
use App\HelperFormatters\Helpers;

class PagamentoAgendadoController extends Controller
{
    protected $model;
    private $validations;
    private $categorias;

    public function __construct(ScheduledPayment $schedule, Request $request)
    {
        $this->model = $schedule;
        $this->categorias = new Categories();
        $this->request = $request;
        $this->validations = new ValidationPagamentoAgendado();
    }

    public function index()
    {
        $pagamentos = $this->model::whereBetween('data_pagamento', [Helpers::ano_inicial(), Helpers::ano_final()])->orderBy('data_pagamento')->paginate(10);
        if ($pagamentos->count() == 0) {
            $msg = "Nenhum Pagamento Agendado no Sistema para o Ano Vigente!";
        } else {
            $msg = "";
        }

        return view('pagamento.index', compact('pagamentos', 'msg'));
    }

    public function create()
    {
        $legend = "Cadastro de Pagamento Agendado";
        $categorias = $this->categorias::where('tipo', 'D')->orderBy('nome_categoria')->get();
        return view('pagamento.create', compact('legend', 'categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['account_id'] = 1;
        $dados['pago'] = "N";
        $error = $this->validations->validatePagamentoAgendado($dados, $this->model, $dados['account_id'], $tv = "create");
        if (!$error) {
            try {
                $this->model::create($dados);
                return response()->json(['success' => 'Pagamento Agendado com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage();
            }
        }
        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        $legend = "Edição de Pagamento Agendado";
        $pagamento = $this->model::find($id);
        $categorias = $this->categorias::where('tipo', 'D')->orderBy('nome_categoria')->get();
        return view('pagamento.edit', compact('pagamento', 'legend', 'categorias'));
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        $dados['account_id'] = 1;
        $error = $this->validations->validatePagamentoAgendado($dados, $this->model, $dados['account_id'], $tv = "edit");

        if (!$error) {
            try {
                $this->model::find($dados['id_pagamento'])->update($dados);
                return response()->json(['success' => 'Pagamento Agendado Alterado com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage();
            }
        }

        return response()->json(['error' => $error], 500);
    }

    public function destroy($id)
    {
        //
    }

}
