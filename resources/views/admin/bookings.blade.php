@extends('layouts.app')
@extends('layouts.admin')

@section('content') 
<div class="container">
    <div class="row col-md-10 col-md-offset-1 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <form class="form-horizontal" method="POST" action="{{ route('adminbookings_search') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Leitor</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-2 control-label">Data/Hora de Início</label>

                            <div class="col-md-3">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" autofocus>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar
                                </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
    </form>

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th>Leitor</th>
            <th>Código da Reserva</th>
            <th>Livro</th>
            <th>Início</th>
            <th>Fim</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
           @foreach($bookings as $booking)
           <tr>
               <td><p>{{$booking->user->name.' '.$booking->user->profile->surname}}</p></td>
               <td><p>{{$booking->cod_booking}}</p></td>
               <td><p>{{$booking->copy->book->title}}</p></td>
               <td><p>{{$booking->start_date}}</p></td>
               <td><p>{{$booking->end_date}}</p></td>
               <td class="text-center">
               <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a class='btn btn-danger btn-xs' href="#"><span class="glyphicon glyphicon-remove"></span> Cancelar</a></td>
           </tr>
            @endforeach 
    </table>
    </div>
</div>
@endsection