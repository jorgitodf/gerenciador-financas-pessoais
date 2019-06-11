@extends('templates.layout')

@section('title', 'Despesa de Cartão de Crédito')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row-fluid">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm sombra" id="div_despesa_cartao">
                    <form class="form-horizontal" role="form" action="{{ route('despesa-cartao.salvar') }}" method="post" id="formCadDespCartaoCredito" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                        @include('despesa_cartao._form')

                            <!-- Form actions -->
                            <div class="col-md-12 col-sm-12">
                                <div class="col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-nov-desp-cartao">Novo</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-desp-cartao" disabled="disabled">Salvar</button>
                                    <a class="btn btn-primary btn-md" href="">Cancelar</a>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2" id="div-msg-cadastro-desp-cartao-credito"></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
