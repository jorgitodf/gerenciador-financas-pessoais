@extends('templates.layout')

@section('title', 'Pagamento Fatura de Cartão de Crédito')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta"> 
        <div class="row-fluid">
            <div class="col-sm-9 col-sm-offset-2 col-md-9 col-md-offset-2">
                <div class="well well-sm sombra" id="">
                @if(isset($faturas) && $faturas->count() > 0)
                    <form class="form-horizontal" role="form" action="{{ route('fatura.salvar') }}" method="post" id="formPagarFaturaCartaoCredito" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-center">{{$legend}}</legend>

                            <table class="table table-striped table-hover table-bordered table-condensed display" id="table_listar_faturas">
                            <thead>
                                <tr>
                                    <th class="th">Data Pagamento</th>
                                    <th class="th">Número Cartão</th>
                                    <th class="th">Bandeira</th>
                                    <th class="th">Banco</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($faturas as $fatura)
                                <tr onclick="location.href = '{{ route('fatura.fechar', $fatura->id) }}' " style="cursor: hand;" data-toggle="tooltip" data-placement="left" title="Clique para Pagar! ">
                                    <td>{{ $fatura->data_pagamento_fatura_formatted }}</td>
                                    <td>{{ $fatura->cartao->numero_cartao_formatted }}</td>
                                    <td>{{ $fatura->cartao->bandeira->bandeira }}</td>
                                    <td>{{ $fatura->cartao->banco->nome_banco }}<br/></td>
                                </tr>
                                @endforeach 
                            </tbody>
                            
                        </table>  

                        </fieldset>        
                    </form>  
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
