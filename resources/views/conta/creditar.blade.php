@extends('templates.layout')

@section('title', 'Creditar')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm sombra" id="div_creditar">
                    <form class="form-horizontal" role="form" action="{{ route('conta.credit') }}" method="post" id="formCadCredito" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-center">Transação Creditar Valor</legend>
                            <div class="form-group col-md-12">
                                <label class="col-sm-2 control-label tam-fonte" for="data_movimentacao">Data Movimentação:</label>
                                <div class="col-sm-4">
                                    <input type="text" id="data_movimentacao" name="data_movimentacao" placeholder="Informe a Data de Movimentação" class="form-control remove_color_input_date white data_movimentacao" autofocus="autofocus" disabled="disabled"/>
                                </div>

                                <label class="col-sm-2 control-label tam-fonte" for="movimentacao">Movimentação:</label>
                                <div class="col-sm-4">
                                    <input type="text" id="movimentacao" name="movimentacao" placeholder="Informe a Movimentação" action="" class="form-control remove_color_input white" disabled="disabled"/>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-sm-2 control-label tam-fonte" for="valor">Valor:</label>
                                <div class="col-sm-4">
                                    <input type="text" id="valor" name="valor" placeholder=" R$ 0,00" action="" class="form-control remove_color_input white" disabled="disabled"/>
                                </div>

                                <label class="col-sm-2 control-label tam-fonte" for="category_id">Categoria:</label>
                                <div class="col-sm-4">
                                    <select class="form-control remove-color-option white" name="category_id" id="category_id" disabled="disabled"/>
                                        <option></option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-nov-credito">Novo</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-cad-credito" disabled>Creditar</button>
                                    <a class="btn btn-primary btn-md" href="{{ route('contas') }}">Cancelar</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3" id="div-msg-cadastro-credito"></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
