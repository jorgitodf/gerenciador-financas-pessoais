@extends('templates.layout')

@section('title', 'Edição de Conta')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <div class="well well-sm sombra" id="div_cad_conta">
                    <form class="form-horizontal" role="form" action="{{ route('conta.atualizar') }}" method="post" id="formCadConta" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                        @include('conta._form')

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 text-left">
                                    <button type="button" class="btn btn-primary btn-md" id="btn-edit-conta">Editar</button>
                                    <button type="submit" class="btn btn-primary btn-md" id="btn-salvar-conta" disabled>Salvar</button>
                                    <a class="btn btn-primary btn-md" href="{{ route('contas') }}">Cancelar</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" id="div-msg-cadastro-conta"></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
