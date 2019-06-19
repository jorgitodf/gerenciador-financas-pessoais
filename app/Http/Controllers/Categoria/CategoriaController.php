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

        if ($categorias->count() == 0) {
            $msg = "Nenhuma Categoria Cadastrada no Sistema!";
        }

        return view('categoria.index', compact('categorias', 'msg'));
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
            try {
                $this->model::create($dados);
                return response()->json(['success' => 'Categoria Cadastrada com Sucesso!', 'base_url' => url('')], 201);
            } catch (\Illuminate\Database\QueryException $ex) {
                $error['error_create'] = $ex->getMessage();
            }
        }

        return response()->json(['error' => $error], 500);
    }

    public function edit($id)
    {
        $legend = "Edição de Categoria";
        $categoria = $this->model::find($id);
        return view('categoria.edit', compact('categoria', 'legend'));
    }

    public function update(Request $request, Categories $categoria)
    {
        $dados = $request->all();

        try {
            $categoria::find($dados['id_categoria'])->update($dados);
            return response()->json(['success' => 'Categoria Alterada com Sucesso!', 'base_url' => url('')], 201);
        } catch (\Illuminate\Database\QueryException $ex) {
            $error['error_create'] = $ex->getMessage();
        }

    }
}
