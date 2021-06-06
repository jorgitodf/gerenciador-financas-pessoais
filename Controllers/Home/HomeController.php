<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduledPayment;
use App\HelperFormatters\Helpers;

class HomeController extends Controller
{
    protected $model;
    private $scheduledPayment;

    public function __construct(Account $account)
    {
        $this->model = $account;
        $this->scheduledPayment = new ScheduledPayment();
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $msg = "";
            $total = 0;

            if ($user->contas->count() == 0) {
                $msg = "Prezado {$user->name}, você ainda não possui nenhuma Conta cadastrada no Sistema, cadastre uma conta para ter acesso a todas as funcionalidades do Sistema!";
            } else if ($user->contas->count() > 0 && session()->get('id_conta') == 0) {
                $contas = $this->model::all();
            } else {
                $pgtos = $this->scheduledPayment::whereBetween('data_pagamento', [Helpers::data_inicial(), Helpers::data_final()])->orderBy('data_pagamento')->get();
                foreach ($pgtos as $pgto) {
                    $total = $total + $pgto->valor;
                }
                $msg = "Ainda não Existe Nenhum Pagamento Agendado para este Mês!";
                $mes = Helpers::verificaMes();
                $ano = Helpers::getAno();
                return view('pagamento.list-pgto', compact('pgtos', 'total', 'mes', 'ano', 'msg'));
            }

        }

        return view('home.index', compact('contas', 'msg'));
    }

}
