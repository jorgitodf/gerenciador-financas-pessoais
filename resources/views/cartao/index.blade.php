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
                                <th>Número do Cartão</th>
                                <th>Data de Validade</th>
                                <th>Bandeira</th>
                                <th>Banco</th>
                                <th>Ativo</th>
                                <th>Pagamento</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartoes as $cartao)
                                <tr>
                                    <td><input type="text" style="text-align:center" class="transparente numero_cartao" value="{{ $cartao->numero_cartao }}" readonly disabled></td>
                                    <td>{{ $cartao->data_validade_formatted }}</td>
                                    <td>{{ $cartao->bandeira->bandeira }}</td>
                                    <td>{{ $cartao->banco->nome_banco }}</td>
                                    <td>{{ $cartao->ativo_formatted }}</td>
                                    <td>{{ $cartao->dia_pgto_fatura_formatted}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('cartao.editar', $cartao->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
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