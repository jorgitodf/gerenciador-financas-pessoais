<?php

namespace App\Http\Controllers\Extrato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Extract;
use App\HelperFormatters\Helpers;

class ExtratoController extends Controller
{
    protected $model;

    public function __construct(Extract $extract, Request $request)
    {
        $this->model = $extract;
        $this->request = $request;
    }

    public function index()
    {
        $extrato = $this->model::whereBetween('data_movimentacao', [Helpers::data_inicial(), Helpers::data_final()])->orderBy('data_movimentacao')->get();
        if ($extrato->count() == 0) {
            $msg = "Não há nenhuma Movimentação em sua Conta neste Mês!!";
        } else {
            $msg = "";
        }
        return view('extrato.index', compact('extrato', 'msg'));
    }

}
