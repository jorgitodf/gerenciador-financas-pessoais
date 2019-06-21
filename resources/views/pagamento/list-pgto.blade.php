@extends('templates.layout')

@section('title', 'Listagem Pagamentos Agendados')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
                @if(isset($pgtos) && $pgtos->count() > 0)
                    <table class="table table-striped table-hover table-bordered table-condensed" id="table_pgto_agendado">
                        <thead>
                        <tr>
                            <td colspan='4' id='cab_table'>Contas Agendadas para {{$mes}} / {{$ano}}</td>
                        </tr>
                        <tr>
                            <th>Movimentação</th>
                            <th>Valor</th>
                            <th>Data Pagamento</th>
                            <th>Pago</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pgtos as $pgto)
                            <tr>
                                @if($pgto->pago == "Não")
                                    <td class='td_color_pgto'>{{ $pgto->movimentacao_formatted }}</td>
                                    <td class='td_color_pgto'>{{ $pgto->valor_formatted }}</td>
                                    <td class='td_color_pgto'>{{ $pgto->data_pagamento_formatted }}</td>
                                    <td class='td_color_pgto'>{{ $pgto->pago }}</td>
                                @else
                                    <td class='td_color_pgto_sim'>{{ $pgto->movimentacao_formatted }}</td>
                                    <td class='td_color_pgto_sim'>{{ $pgto->valor_formatted }}</td>
                                    <td class='td_color_pgto_sim'>{{ $pgto->data_pagamento_formatted }}</td>
                                    <td class='td_color_pgto_sim'>{{ $pgto->pago }}</td>
                                @endif
                            </tr>
                            @endforeach()
                        <tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" align='center' class="cor_preta">Total de Contas a Pagar em {{$mes}} / {{$ano}}</td>
                            <td colspan="2" align='center' class='cor_preta tam_fonte'>R$ {{ number_format($total, 2, ',', '.') }}</td>
                        <tr>
                        </tfoot>
                    </table>
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
