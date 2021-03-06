@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
    <a href="asset/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar nova Estante</a>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
            @foreach($bookcases as $bookcase)
           <tr>
               <td>{{$bookcase->id}}</td>
               <td>{{$bookcase->name}}</td>
               <td>{{$bookcase->description}}</td>
               <td class="text-center">


               <a class='btn btn-info btn-xs' href="{{route('bookcase.edit', $bookcase->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection