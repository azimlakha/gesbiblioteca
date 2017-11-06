@extends('layouts.app')

@section('content') 
<div class="container">
    <div class="row col-md-10 col-md-offset-1 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Editora</th>
            <th>Disciplina</th>
            <th>Autor(es)</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
            @foreach($books as $book)
           <tr>
               <td>{{$book->id}}</td>
               <td>{{$book->title}}</td>
               <td>{{$book->publisher->name}}</td>
               <td>{{$book->subject->name}}</td>
               <td>@foreach($book->authors as $author)<p>{{$author->name}}</p>@endforeach</td>
               
               <td class="text-center">


               <a class='btn btn-info btn-xs' href="{{route('booking.create', $book->id)}}"><span class="glyphicon glyphicon-edit"></span> Reservar</a></td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection