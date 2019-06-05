@extends('templates.layout')

@section('title', 'Cadastro de Cartão de Crédito')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row">   
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <div class="well well-sm sombra" id="div_cad_cartao">
                    <form class="form-horizontal" role="form" action="{{route('cartao.salvar')}}" method="post" id="formCadCartaoCredito" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                        @include('cartao._form')
                    
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 text-left">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-nov-cartao">Novo</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-cad-cartao" disabled>Cadastrar</button>
                                    <a class="btn btn-primary btn-md" href="{{ route('cartoes') }}">Cancelar</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" id="div-msg-cadastro-cartao-credito"></div>   
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()