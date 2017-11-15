@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Não possui permissão para aceder esta página</div>

                <div class="panel-body">
                    Clique <a class='' href="{{route('homepage')}}">aqui</a> para voltar para a página inicial
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
