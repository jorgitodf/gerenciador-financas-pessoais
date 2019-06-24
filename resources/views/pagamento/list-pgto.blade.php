@extends('templates.layout')

@section('title', 'Listagem Pagamentos Agendados')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
                <input type="hidden" id="url" value="{{ route('pagamento.verificar') }}">
                @if(isset($pgtos) && $pgtos->count() > 0)
                    <table class="table table-striped table-hover table-bordered table-condensed" id="table_pgto_agendado">
                        <thead>
                        <tr>
                            <td colspan='4' id='cab_table'>Contas Agendadas para {{$mes}} / {{$ano}}</td>
                            <input type="hidden" id="id_conta" value="{{ session()->get('id_conta') }}">
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

            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1" id="div-msg-pagamento-agendado">
            </div>

        </div>
    </div>
    
    <script type="text/javascript">
    //VERIFICA SE HÁ PAGAMENTO AGENDADO A SER PAGO NA PRESETE DATA E REALIZA O PAGAMENTO
    jQuery(function($) {
        var id_conta = $("#id_conta").val();
        var url = $("#url").val();

        setTimeout(function() {
            let data = {id_conta: id_conta};

            axios.post(url, simpleQueryString.stringify(data))
            .then(function(response) {
                if (response.status == 201 && response.data['status'] == 2) {
                    $("#div-msg-pagamento-agendado").html("<span class='alert alert-warning msgError' id='span-msg-pagamentos-agendados'>"+ response.data['response'] +"</span>").css("display", "block");
                    $("#table_pgto_agendado").html(generateTabelaPagamentosAgendados(response.data['pagamentos']['pagamentos'], response.data['pagamentos']['ano']));
                    setInterval(function() {
                        $("#span-msg-pagamentos-agendados").remove();
                    }, 5000);
                } else if (response.status == 201 && response.data['status'] == 1) {
                    $("#div-msg-pagamento-agendado").html("<span class='alert alert-warning msgSuccess' id='span-msg-pagamentos-agendados'>"+ response.data['response'] +"</span>").css("display", "block");
                    $("#table_pgto_agendado").html(generateTabelaPagamentosAgendados(response.data['pagamentos']['pagamentos'], response.data['pagamentos']['ano']));
                    setInterval(function() {
                        $("#span-msg-pagamentos-agendados").remove();
                    }, 5000); 
                }
            })
            .catch(function(error) {
                /* if (error.response.status == 500) {
                    if (!error.response.data.error['error_create'] == "") {
                        alert(error.response.data.error['error_create']);
                    }
                } */
            })

        }, 5000);     
    });


    </script>
@endsection()
