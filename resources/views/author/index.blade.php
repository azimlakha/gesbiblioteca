@extends('layouts.app')

@section('content') 
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
    <a href="author/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar novo Autor</a>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
            @foreach($authors as $author)
           <tr>
               <td>{{$author->id}}</td>
               <td>{{$author->name}}</td>
               <td class="text-center">


               <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection