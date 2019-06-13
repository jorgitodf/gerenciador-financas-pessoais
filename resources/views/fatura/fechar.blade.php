@extends('templates.layout')

@section('title', 'Pagamento Fatura de Cartão de Crédito')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div_fechar_fatura_cartao">
        <div class="row-fluid">
            <div class="col-sm-11 col-sm-offset-1 col-md-11 col-md-offset-1">
                <div class="well well-sm sombra" id="well_fechar_fatura_cartao">
                    <form class="form-horizontal" role="form" action="{{ route('fatura.quitar') }}" method="post" id="formPagarFatura" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-center">{{$legend}}</legend>

                            <div class="row-fluid col-sm-12 col-md-12 col-lg-12 contenedor">
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido">
                                    <label class="control-label tam-fonte" for="num_cartao">Número do Cartão:</label>
                                    <input type="text" name="num_cartao" id="num_cartao" class="form-control input-sm" readonly="true" value="{{ $fatura->cartao->numero_cartao_formatted }}"/>
                                    <input type="hidden" name="id" id="id" value="{{ $fatura->id }}"/>
                                </div>

                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido">
                                    <label for="nome_banco" class="control-label tam-fonte">Banco:</label>
                                    <input type="text" name="nome_banco" id="nome_banco" class="form-control input-sm" readonly="true" value="{{ $fatura->cartao->banco->nome_banco }}"/>
                                </div>

                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="nome_bandeira" class="control-label tam-fonte">Bandeira:</label>
                                    <input type="text" name="nome_bandeira" id="nome_bandeira" class="form-control input-sm" readonly="true" value="{{ $fatura->cartao->bandeira->bandeira }}"/>
                                </div>

                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="dt_vencimento" class="control-label tam-fonte">Data de Vencimento:</label>
                                    <input type="text" name="dt_vencimento" id="dt_vencimento" class="form-control input-sm" readonly="true" value="{{ $fatura->data_pagamento_fatura_formatted }}"/>
                                </div>
                            </div>

                            <div class="row-fluid col-sm-12 col-md-12 col-lg-12" id="">
                                <table class="table table-hover table-condensed table-responsive" id="table_lista_itens_fatura">
                                    <thead>
                                        <tr>
                                            <th class="alinha_th_centro muda_label" width="15%">Data da Compra</th>
                                            <th class="alinha_th_centro muda_label" width="40%">Descrição</th>
                                            <th class="alinha_th_centro muda_label" width="15%">Parcela</th>
                                            <th class="alinha_th_centro muda_label" width="10%">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($despesas  as $despesa)
                                        <tr>
                                            <td class="alinha_td_centro"><input type="hidden" name="itens_desp[]" id="itens_desp" value="{{ $despesa->id }}"/>{{ date("d/m/Y", strtotime($despesa->data_compra)) }}</td>
                                            <td class="">{{ $despesa->descricao }}</td>
                                            <td class="alinha_td_centro">{{ $despesa->numero_parcela }}</td>
                                            <td class="">R$ <span class="alinha_td_direita">{{ number_format($despesa->valor, 2, ',', '.') }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="tamanho_fonte alinha_td_centro">SubTotal</td>
                                            <td class="muda_label"></td>
                                            <td class="muda_label"></td>
                                            <td class="tamanho_fonte">R$ {{ number_format($total, 2, ',', '.') }}</td>
                                            <input type="hidden" name="subtotal" id="subtotal" value="{{ number_format($total, 2, ',', '.') }}"/>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="row-fluid col-sm-12 col-md-12 col-lg-12 contenedor" id="">
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="encargos" class="control-label muda_label">Encargos:</label>
                                    <input type="text" name="encargos" id="encargos" class="form-control input_sm" disabled="disabled" value=""/>
                                </div>
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="iof" class="control-label muda_label">IOF:</label>
                                    <input type="text" name="iof" id="iof" class="form-control input_sm" disabled="disabled" value=""/>
                                </div>
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="anuidade" class="control-label muda_label">Anuidade:</label>
                                    <input type="text" name="anuidade" id="anuidade" class="form-control input_sm" disabled="disabled" value=""/>
                                </div>
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="protecao_premiada" class="control-label muda_label">Proteção Premiada:</label>
                                    <input type="text" name="protecao_premiada" id="protecao_premiada" class="form-control input_sm" disabled="disabled" value=""/>
                                </div>
                            </div>

                            <div class="row-fluid col-sm-12 col-md-12 col-lg-12 contenedor" id="">
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="juros" class="control-label muda_label">Juros:</label>
                                    <input type="text" name="juros" id="juros" class="form-control input_sm" disabled="disabled" value=""/>
                                </div>
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="restante_fatura_mes_anterior" class="control-label muda_label">Restante Fatura Anterior:</label>
                                    <input type="text" name="restante_fatura_mes_anterior" id="restante_fatura_mes_anterior" class="form-control input_sm" value="{{ $restante[0]->restante_fatura_mes_anterior_formatted }}" readonly="true"/>
                                </div>
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="valor_total_fatura" class="control-label muda_label">Valor Total Fatura:</label>
                                    <input type="text" name="valor_total_fatura" id="valor_total_fatura" class="form-control input_sm" value="" readonly="true"/>
                                </div>
                                <div class="form-group form-group-sm col-sm-3 col-md-3 col-lg-3 contenido" id="">
                                    <label for="valor_pagamento_fatura" class="control-label muda_label">Valor a Pagar:</label>
                                    <input type="text" name="valor_pagamento_fatura" id="valor_pagamento_fatura" class="form-control input_sm" disabled="disabled" value=""/>
                                    <input type="hidden" name="set_vlr_pagar" value="pagar"/>
                                </div>
                            </div>

                            <div class="row-fluid col-sm-12 col-md-12 col-lg-12" id="">
                                <div class="row-fluid col-sm-5 col-md-5 col-lg-5" id="">
                                    <button type="button" id="btn_novo_pgto_fatura" class="btn btn-primary">Novo</button>
                                    <button type="button" id="btn_calcular_fatura" class="btn btn-primary" disabled="disabled">Calcular</button>
                                    <button type="submit" id="btn_pagar_fatura" class="btn btn-primary" disabled="disabled">Pagar</button>
                                    <button type="button" id="btn_limpar_pgto_fatura" class="btn btn-primary" disabled="disabled">Limpar</button>
                                </div>
                                <div class="row-fluid form-group form-group-sm col-sm-5 col-md-5 col-lg-5" id="div-msg-quitar-fatura-cartao-credito">

                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
