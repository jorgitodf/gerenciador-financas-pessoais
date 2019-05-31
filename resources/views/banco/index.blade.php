@extends('templates.layout')

@section('title', 'Cadastro de Banco')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">   
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra">
                    <table>
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Banco</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bancos as $banco)
                            <tr>
                            <td>{{ $banco->cod_banco_formatted }}</td>
                            <td>{{ $banco->nome_banco }}</td>
                            <td>
                                <a class="btn deep-orange" href="{{ route('banco.editar', $banco->cod_banco) }}">Editar</a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection()