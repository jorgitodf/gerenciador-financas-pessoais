@extends('templates.layout')

@section('title', 'Página Home')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-home">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1" id="div_princ_home">
                @if(isset($contas) && $contas->count() > 0)
                <div class="well well-sm well-md well-xs sombra">
                <div class="panel-heading" id="panel_head_agendamento_pagamento">Selecione uma Conta abaixo para obter acesso a todas Operações do Sistema!!!</div>

                <table class="table table-striped table-hover table-bordered table-condensed" id="table_contas">
                    <thead>
                        <tr>
                            <th>Selecione</th>
                            <th>Cód. Agência</th>
                            <th>Conta</th>
                            <th>Operação</th>
                            <th>Tipo de Conta</th>
                            <th>Banco</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contas as $conta)
                        <tr>
                            <td><input type="radio" class="custom-control-input" name="id" id="id" value="{{ $conta->id }}" /></td>
                            <td>{{ csrf_field() }} {{$conta->codigo_agencia_formatted}}</td>
                            <td><input type="hidden" name="url" id="url" value="{{ url('') }}" />  {{ $conta->numero_conta }}-{{ $conta->digito_verificador_conta }}</td>
                            <td>{{ $conta->codigo_operacao_formatted }}</td>
                            <td>{{ $conta->tipo_conta->tipo_conta }}</td>
                            <td>{{ $conta->banco->nome_banco }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @else
                    @if(isset($msg) && !empty($msg))
                    <div class="row-fluid text-center alert alert-warning">
                        <strong>Atenção!!</strong><p>{{ $msg ?? $msg }}</p>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

@endsection()
