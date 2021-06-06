<?php

namespace App\Http\Controllers\Bandeira;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FlagCards;
use App\Validations\ValidationBandeira;

class BandeiraCartaoController extends Controller
{
    protected $model;
    private $validations;

    public function __construct(FlagCards $flagCards, Request $request)
    {
        $this->model = $flagCards;
        $this->request = $request;
        $this->validations = new ValidationBandeira();
    }

    public function index()
    {
        $bandeiras = $this->model::orderBy('bandeira')->paginate(6);
        return view('bandeira.index', compact('bandeiras'));
    }

    public function create()
    {
        $legend = "Cadastro de Bandeira";
        return view('bandeira.create', compact('legend'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateBandeira($dados, $this->model);

        if (!$error) {
            $this->model::create($dados);
            return response()->json(['success' => 'Bandeira Cadastrada com Sucesso!', 'base_url' => url('')], 201);
            return redirect()->route('bandeiras');
        }

        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        $legend = "Edição de Bandeira de Cartão";
        $bandeira = $this->model::find($id);
        return view('bandeira.edit', compact('bandeira', 'legend'));
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateBandeira($dados, $this->model);

        if (!$error) {
            $this->model::find($dados['id_bandeira'])->update($dados);
            return response()->json(['success' => 'Bandeira Alterada com Sucesso!', 'base_url' => url('')], 201);
        }

        return response()->json(['error' => $error], 500);
    }

}
