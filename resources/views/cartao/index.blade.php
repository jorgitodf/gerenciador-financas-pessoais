@extends('templates.layout')

@section('title', 'Cadastro de Cartão de Crédito')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra table-responsive">
                    @if(isset($cartoes) && $cartoes->count() > 0)
                        <table class="table table-hover table-condensed table-bordered" id="table_cartoes">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome do Banco</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartoes as $cartao)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a class="btn deep-orange" href="{{ route('cartao.editar', $cartao->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row" align="center">
                            {{ $cartoes->links() }}
                        </div>
                    @else
                        <div class="row-fluid text-center alert alert-info">
                            <strong>Atenção!!</strong><p>{{ $msg ?? $msg }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection()