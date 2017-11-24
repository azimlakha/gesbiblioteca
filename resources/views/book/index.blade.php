@extends('layouts.app')

@extends('layouts.admin')

@section('content') 
<div class="container">
    <div class="row col-md-12 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
    <a href="book/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar novo Livro</a>
        <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Título</th>
            <th>Editora</th>
            <th>Edição</th>
            <th>Área de Conhecimento</th>
            <th>Disciplina</th>
            <th>Autor(es)</th>
            <th>Cópias Disponíveis</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
            @foreach($books as $book)
           <tr>
               <td>{{$book->id}}</td>
               <td>{{$book->ISBN}}</td>
               <td>{{$book->title}}</td>
               <td>{{$book->publisher->name}}</td>
               <td>{{$book->edition}}</td>
               <td>{{$book->knowledge_area->name}}</td>
               <td>{{$book->subject->name}}</td>
               <td>@foreach($book->authors as $author)<p>{{$author->name}}</p>@endforeach</td>
               <td align="center">{{$copies[$book->id]}} @if ($copies[$book->id]>0)<a class='btn btn-info btn-xs' href="{{route('copy', $book->id)}}"><span class="glyphicon glyphicon-search"></span> Ver todas</a>
                @else <a href="{{route('copy.create', $book->id)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Exemplar</a>
              @endif</td>
               <td class="text-center">
               <a class='btn btn-info btn-xs' href="{{route('book.edit', $book->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection