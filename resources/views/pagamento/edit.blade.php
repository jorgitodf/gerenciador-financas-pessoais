@extends('templates.layout')

@section('title', 'Pagamento Agendado | Edição')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row-fluid col-md-12 col-sm-12">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm sombra" id="div_debitar">
                    <form class="form-horizontal" role="form" action="{{ route('pagamento.atualizar') }}" method="post" id="formCadAgendamentoPagamento" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-center">{{ $legend }}</legend>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="col-sm-3 col-md-3 control-label tam-fonte" for="data_pagamento">Data do Pagamento:</label>
                                <div class="col-sm-3 col-md-3">
                                    <input type="text" id="data_pagamento" name="data_pagamento" action="update" class="form-control remove_color_input_date white data_movimentacao" value="{{ $pagamento->data_pagamento_formatted ?? '' }}" disabled="disabled">
                                </div>
                                <input type="hidden" id="id_pagamento" name="id_pagamento" value="{{isset($pagamento->id) ? $pagamento->id : ''}}">

                                <label class="col-sm-2 control-label tam-fonte" for="movimentacao">Movimentação:</label>
                                <div class="col-sm-4 col-md-4">
                                    <input type="text" id="movimentacao" name="movimentacao" action="update" placeholder="Descrição da Movimentação" class="form-control remove_color_input white" value="{{ $pagamento->movimentacao_formatted ?? '' }}" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label class="col-sm-3 col-md-3 control-label tam-fonte" for="valor">Categoria:</label>
                                <div class="col-sm-3 col-md-3">
                                    <input type="text" id="valor" name="valor" placeholder=" R$ 0,00" action="update" class="form-control remove_color_input white" value="{{ $pagamento->valor_formatted ?? '' }}" disabled="disabled"/>
                                </div>

                                <label class="col-sm-2 control-label tam-fonte" for="category_id">Categoria:</label>
                                <div class="col-sm-4 col-md-4">
                                    <select class="form-control remove-color-option white" name="category_id" id="category_id" disabled="disabled"/>
                                    <option value="{{ isset($pagamento->categoria->id) ? $pagamento->categoria->id : '' }}">{{ isset($pagamento->categoria->nome_categoria) ? $pagamento->categoria->nome_categoria : "" }}</option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-edit-agd-pgto">Editar</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-salv-agd-pgto" disabled>Salvar</button>
                                    <a class="btn btn-primary btn-md" href="{{ route('pagamentos') }}">Cancelar</a>
                                </div>
                                <div class="col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2" id="div-msg-cadastro-agd-pgto">
                                    <span class='alert alert-success msgSuccess' id='span-success-cadastro-agd-pgto'>Pagamento Agendado Alterado com Sucesso!</span>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
