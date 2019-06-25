@extends('templates.layout')

@section('title', 'Fatura de Cartão de Crédito')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row-fluid">
            <div class="col-sm-9 col-sm-offset-2 col-md-9 col-md-offset-2">
                <div class="well well-sm sombra" id="div_gera_fatura_cartao">
                    <form class="form-horizontal" role="form" action="{{ route('fatura.salvar') }}" method="post" id="formFaturaCartaoCredito" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                        <legend class="text-center">{{ $legend }}</legend>

                            <div class="form-group col-md-12 col-sm-12">
                                <label class="col-sm-3 col-md-3 control-label tam-fonte" for="credit_card_id">Cartão:</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control remove-color-option white" name="credit_card_id" id="credit_card_id" action="" disabled="disabled"/>
                                    <option></option>
                                    @foreach($cartoes as $cartao)
                                        <option value="{{ $cartao->id }}">{{ $cartao->numero_cartao_formatted }} - {{ $cartao->bandeira->bandeira }} - {{ $cartao->banco->nome_banco }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label class="col-sm-3 col-md-3 control-label tam-fonte" for="data_pagamento_fatura">Data Pagamento:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" id="data_pagamento_fatura" name="data_pagamento_fatura" action="" class="form-control remove_color_input_date white data_movimentacao"" disabled="disabled">
                                    <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="col-md-12 col-sm-12">
                                <div class="col-sm-5 col-sm-offset-3 col-md-5 col-md-offset-3">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-nov-fatura-cartao">Novo</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-fatura-cartao" disabled="disabled">Gerar</button>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-4 col-sm-4 col-md-offset-5 col-sm-offset-5" id="div-msg-gerar-fatura-cartao-credito">
                                    
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
