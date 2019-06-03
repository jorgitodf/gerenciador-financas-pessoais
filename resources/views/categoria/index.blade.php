@extends('templates.layout')

@section('title', 'Cadastro de Categoria')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra table-responsive">
                    @if(isset($categorias) && $categorias->count() > 0)
                        <table class="table table-hover table-condensed table-bordered" id="table_categorias">
                            <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Despesa Fixa</th>
                                <th>Tipo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->nome_categoria_formatted }}</td>
                                    <td>{{ $categoria->despesa_fixa_formatted }}</td>
                                    <td>{{ $categoria->tipo_formatted }}</td>
                                    <td>
                                        <a class="btn deep-orange" href="{{ route('categoria.editar', $categoria->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row" align="center">
                            {{ $categorias->links() }}
                        </div>
                    @else
                        <div class="row-fluid text-center">
                            <p>Nenhuma Categoria Cadastrada</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection()