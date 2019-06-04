<?php

namespace App\Http\Controllers\Cartao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CreditCard;
use App\Validations\ValidationCartao;

class CartaoController extends Controller
{
    protected $model;
    private $validations;

    public function __construct(CreditCard $creditCard, Request $request)
    {
        $this->model = $creditCard;
        $this->request = $request;
        $this->validations = new ValidationCartao();
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
