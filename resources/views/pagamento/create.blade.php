@extends('templates.layout')

@section('title', 'Pagamento Agendado | Criação')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row-fluid col-md-12 col-sm-12">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm sombra" id="div_debitar">
                    <form class="form-horizontal" role="form" action="{{ route('pagamento.salvar') }}" method="post" id="formCadAgendamentoPagamento" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-center">{{ $legend }}</legend>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="col-sm-3 col-md-3 control-label tam-fonte" for="data_pagamento">Data do Pagamento:</label>
                                <div class="col-sm-3 col-md-3">
                                    <input type="text" id="data_pagamento" name="data_pagamento" action="" class="form-control remove_color_input_date white data_movimentacao" disabled="disabled">
                                </div>

                                <label class="col-sm-2 control-label tam-fonte" for="movimentacao">Movimentação:</label>
                                <div class="col-sm-4 col-md-4">
                                    <input type="text" id="movimentacao" name="movimentacao" action="" placeholder="Descrição da Movimentação" class="form-control remove_color_input white" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label class="col-sm-3 col-md-3 control-label tam-fonte" for="valor">Categoria:</label>
                                <div class="col-sm-3 col-md-3">
                                    <input type="text" id="valor" name="valor" placeholder=" R$ 0,00" action="" class="form-control remove_color_input white" disabled="disabled"/>
                                </div>

                                <label class="col-sm-2 control-label tam-fonte" for="category_id">Categoria:</label>
                                <div class="col-sm-4 col-md-4">
                                    <select class="form-control remove-color-option white" name="category_id" id="category_id" disabled="disabled"/>
                                        <option></option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-nov-agd-pgto">Novo</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-cad-agd-pgto" disabled>Agendar</button>
                                    <a class="btn btn-primary btn-md" href="{{ route('pagamentos') }}">Cancelar</a>
                                </div>
                                <div class="col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2" id="div-msg-cadastro-agd-pgto"></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
