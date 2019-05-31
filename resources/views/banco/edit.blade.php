@extends('templates.layout')

@section('title', 'Cadastro de Banco')

@section('content')

    <div class="container col-md-9 col-sm-9 col-xs-9" id="div-principal-conta">
        <div class="row">   
            <div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-7 col-xs-offset-3">
                <div class="well well-sm sombra">
                <form class="form-horizontal" role="form" action="{{route('banco.atualizar')}}" method="post" id="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>
                @include('banco._form')
            
                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 text-left">
                            <button type="button" class="btn btn-primary btn-md" id="btn-nov-bnc">Editar</button>
                            <button type="submit" class="btn btn-primary btn-md" id="btn-cad-bnc" disabled>Salvar</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-4" id="div-msg-cadastro-banco"></div>
                    </div>

                </fieldset>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection()