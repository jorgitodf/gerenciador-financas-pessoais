@extends('templates.layout')

@section('title', 'Cadastro de Bandeira de Cartão')

@section('content')

    <div class="container col-xs-10 col-md-10 col-sm-10" id="div-principal-conta">
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="well well-sm well-md well-xs sombra table-responsive">
                    @if(isset($bandeiras) && $bandeiras->count() > 0)
                        <table class="table table-hover table-condensed table-bordered" id="table_bandeiras">
                            <thead>
                            <tr>
                                <th>Bandeira</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bandeiras as $bandeira)
                                <tr>
                                    <td>{{ $bandeira->bandeira_formatted }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('bandeira.editar', $bandeira->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
                        </table>
                        <div class="row" align="center">
                            {{ $bandeiras->links() }}
                        </div>
                    @else
                        <div class="row-fluid text-center">
                            <p>Nenhuma Bandeira de Cartão cadastrada!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection()