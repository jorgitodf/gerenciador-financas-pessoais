<?php

namespace App\Http\Controllers\Categoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Validations\ValidationCategoria;

class CategoriaController extends Controller
{
    protected $model;
    private $validations;

    public function __construct(Categories $categoria, Request $request)
    {
        $this->model = $categoria;
        $this->request = $request;
        $this->validations = new ValidationCategoria();
    }

    public function index()
    {
        $categorias = $this->model::orderBy('nome_categoria')->paginate(10);
        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        $legend = "Cadastro de Categoria";
        return view('categoria.create', compact('legend'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $error = $this->validations->validateCategoria($dados, $this->model);

        if (!$error) {
            $this->model::create($dados);
            return response()->json(['success' => 'Categoria Cadastrada com Sucesso!', 'base_url' => url('')], 201);
            return redirect()->route('categorias');
        }

        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        $legend = "Edição de Categoria";
        $categoria = $this->model::find($id);
        return view('categoria.edit', compact('categoria', 'legend'));
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        if ($this->model::find($dados['id_categoria'])->update($dados)) {
            return response()->json(['success' => 'Categoria Alterada com Sucesso!', 'base_url' => url('')], 201);
        }
    }
}
