@extends('templates.layout')

@section('title', 'Cadastro de Tipo de Conta')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row">
            <div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-7 col-xs-offset-3">
                <div class="well well-sm sombra" id="div_cad_tpconta">
                    <form class="form-horizontal" role="form" action="{{ route('tipo-conta.salvar') }}" method="post" id="formCadTipoConta" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                        @include('tipo_conta._form')

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 text-left">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-nov-tpconta">Novo</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-cad-tpconta" disabled>Cadastrar</button>
                                    <a class="btn btn-primary btn-md" href="{{ route('tipo-contas') }}">Cancelar</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" id="div-msg-cadastro-tpconta"></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
