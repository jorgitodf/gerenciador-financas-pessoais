@extends('templates.layout')

@section('title', 'Cadastro de Conta')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra table-responsive">
                    @if(isset($contas) && $contas->count() > 0)
                        <table class="table table-hover table-condensed table-bordered" id="table_conta">
                            <thead>
                            <tr>
                                <th>Cód. Agência</th>
                                <th>Dig. Agência</th>
                                <th>Número Conta</th>
                                <th>Cód. Operação</th>
                                <th>Tipo de Conta</th>
                                <th>Banco</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contas as $conta)
                                <tr>
                                    <td>{{ $conta->codigo_agencia_formatted }}</td>
                                    <td>{{ $conta->digito_verificador_agencia }}</td>
                                    <td>{{ $conta->numero_conta }}-{{ $conta->digito_verificador_conta }}</td>
                                    <td>{{ $conta->codigo_operacao_formatted }}</td>
                                    <td>{{ $conta->tipo_conta->tipo_conta }}</td>
                                    <td>{{ $conta->banco->nome_banco }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('conta.editar', $conta->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
                        </table>
                        <div class="row" align="center">
                            {{ $contas->links() }}
                        </div>
                    @else
                        <div class="row-fluid text-center alert alert-info">
                            <strong>Atenção!!</strong><p>{{ $msg ?? $msg }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection()
