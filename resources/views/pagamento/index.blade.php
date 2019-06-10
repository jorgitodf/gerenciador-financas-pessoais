@extends('templates.layout')

@section('title', 'Pagamentos Agendados')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra">
                @if(isset($pagamentos) && $pagamentos->count() > 0)    
                <div class="panel-heading" id="panel_head_agendamento_pagamento">Listagem Geral de Agendamento de Pagamentos</div>
                <div class="panel-body" id="div_panel_body">
                    <table class="row col-xs-12 col-md-12 col-sm-12 table table-bordered table-responsive table-hover table-condensed" id="tabela_index_agendamento_pagamento">
                        <thead>
                            <tr>
                                <th width="15%">Data de Pagamento</th>
                                <th width="32%">Movimentação</th>
                                <th width="20%">Categoria</th>
                                <th width="10%">Valor</th>
                                <th width="4%">Pago</th>
                                <th colspan="2" width="8%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pagamentos as $pagamento)
                            <tr>
                                <td>{{ $pagamento->data_pagamento_formatted }}</td>
                                <td>{{ $pagamento->movimentacao_formatted }}</td>
                                <td>{{ $pagamento->categoria->nome_categoria }}</td>
                                <td>{{ $pagamento->valor_formatted }}</td>
                                @if( $pagamento->pago == "Sim")
                                    <td><span class="glyphicon glyphicon-ok cor_verde" aria-hidden="true" title="Pago"></span></td>
                                @else()
                                    <td><span class="glyphicon glyphicon-alert cor_vermelho" aria-hidden="true" title="Não Pago"></span></td>
                                @endif
                                @if( $pagamento->pago == "Sim")
                                    <td><a class="glyphicon glyphicon-pencil disabled" aria-hidden="true" title="Não é possível Editar" href=""></a></td>
                                    <td><a class="glyphicon glyphicon-trash disabled" aria-hidden="true" title="Não é possível Apagar"></a></td>
                                @else()
                                    <td><a class="glyphicon glyphicon-pencil" aria-hidden="true" title="Editar" href="{{ route('pagamento.editar', $pagamento->id) }}"></a></td>
                                    <td><a class="glyphicon glyphicon-trash" aria-hidden="true" title="Apagar" href="{{ route('pagamento.apagar', $pagamento->id) }}"></a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row" align="center">
                        {{ $pagamentos->links() }}
                    </div>
                @else
                    <div class="row-fluid text-center alert alert-info">
                        <strong>Atenção!!</strong><p>{{ $msg ?? $msg }}</p>
                    </div>
                
                </div> 
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection()
