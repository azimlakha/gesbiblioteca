@extends('layouts.app')
@extends('layouts.user')

@section('content') 
<div class="container">
    <div class="row col-md-8 col-md-offset-2 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th>Código da Rserva</th>
            <th>Livro</th>
            <th>Data/Hora</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
           @foreach($user->bookings as $booking)
           <tr>
               <td><p>{{$booking->cod_booking}}</p></td>
               <td><p>{{$booking->copy->book->title}}</p></td>
               <td><p>{{$booking->created_at}}</p></td>
               <td class="text-center">
               <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a class='btn btn-danger btn-xs' href="#"><span class="glyphicon glyphicon-remove"></span> Cancelar</a></td>
           </tr>
            @endforeach 
    </table>
    </div>
</div>
@endsection