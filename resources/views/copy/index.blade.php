@extends('layouts.app')

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row col-md-10 col-md-offset-1 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
    @foreach($copies as $copy)
    @endforeach  
    <a href="{{route('copy.create', $copy->book->id)}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar novo Exemplar</a>
        <tr>
            <th>ID</th>
            <th>Título do Livro</th>
            <th>Localização</th>
            <th>Disponibilidade</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
            @foreach($copies as $copy)
           <tr>
               <td>{{$copy->id.'_'.$copy->book->ISBN}}</td>
               <td>{{$copy->book->title}}</td>
               <td>{{$copy->location->section->name.'_'.$copy->location->bookcase->name.'_'.$copy->location->shelf->name}}</td>
               <td>{{$copy->conservation == "Bom" ? "Disponivel" : "Indisponivel"}}</td>
               <td class="text-center">


               <a class='btn btn-info btn-xs' href="{{route('copy.edit', $copy->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection