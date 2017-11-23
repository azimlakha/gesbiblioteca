@extends('layouts.app')
@extends('layouts.user')

@section('content') 
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Data adicionada</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
           @foreach($user->books as $book)
           <tr>
               <td><p>{{$book->title}}</p></td>
               <td><p>{{$book->created_at}}</p></td>
               <td class="text-center">
               <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Retirar</a></td>
           </tr>
            @endforeach 
    </table>
    </div>
</div>
@endsection