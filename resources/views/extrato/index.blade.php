@extends('templates.layout')

@section('title', 'Cadastro de Tipo de Conta')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra table-responsive">
                    @if(isset($extrato) && $extrato->count() > 0)
                        <table class="table table-striped table-hover table-bordered table-condensed display" id="table_extrato">
                            <thead>
                                <tr>
                                    <th class="th">Data</th>
                                    <th class="th">Movimentação</th>
                                    <th class="th">Categoria</th>
                                    <th class="th">Valor</th>
                                    <th class="th">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($extrato as $ext)
                                <tr>
                                @if($ext->tipo_operacao == 'Débito')
                                    <td class='fonte_data td'>{{ $ext->data_movimentacao_formatted }}</td>
                                    @if($ext->despesa_fixa == 'S')
                                    <td class='fonte_despesa td'>{{ $ext->movimentacao_formatted }}</td>
                                    <td class='fonte_despesa td'>{{ $ext->categoria->nome_categoria }}</td>
                                    <td class='fonte_despesa td'>{{ $ext->valor_formatted }}</td>
                                    <td class='fonte_despesa td'>{{ $ext->saldo_formatted }}</td>
                                    @else()
                                    <td class='fonte_despesa_fixa td'>{{ $ext->movimentacao_formatted }}</td>
                                    <td class='fonte_despesa_fixa td'>{{ $ext->categoria->nome_categoria }}</td>
                                    <td class='fonte_despesa_fixa td'>{{ $ext->valor_formatted }}</td>
                                    <td class='fonte_despesa_fixa td'>{{ $ext->saldo_formatted }}</td>
                                    @endif
                                @else()
                                    <td class='fonte_data td'>{{ $ext->data_movimentacao_formatted }}</td>
                                    <td class='fonte_receita td'>{{ $ext->movimentacao_formatted }}</td>
                                    <td class='fonte_receita td'>{{ $ext->categoria->nome_categoria }}</td>
                                    <td class='fonte_receita td'>{{ $ext->valor_formatted }}</td>
                                    <td class='fonte_receita td'>{{ $ext->saldo_formatted}}</td>
                                @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="row-fluid text-center alert alert-info">
                            <strong>Atenção!!</strong><p>{{ $msg ?? $msg }}</p>
                        </div>
                    @endif
                    <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">     
                </div>
            </div>
        </div>
    </div>

@endsection()
