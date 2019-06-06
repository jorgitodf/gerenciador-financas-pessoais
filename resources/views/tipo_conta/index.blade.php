@extends('templates.layout')

@section('title', 'Cadastro de Tipo de Conta')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra table-responsive">
                    @if(isset($tipo_contas) && $tipo_contas->count() > 0)
                        <table class="table table-hover table-condensed table-bordered" id="table_tipo_conta">
                            <thead>
                            <tr>
                                <th>Tipo de Conta</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipo_contas as $tipo_conta)
                                <tr>
                                    <td>{{ $tipo_conta->tipo_conta }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('tipo-conta.editar', $tipo_conta->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row" align="center">
                            {{ $tipo_contas->links() }}
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
