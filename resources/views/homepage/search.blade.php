@extends('layouts.app')
@extends('layouts.user')

@section('content') 
<div class="container">
    <div class="row col-md-10 col-md-offset-1 custyle">

    <form class="form-horizontal" method="POST" action="{{ route('home/search') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author" class="col-md-4 control-label">Autor</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}" autofocus>

                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar
                                </button>
                            </div>
                        </div>
    </form>
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
                    <a class='btn btn-heart btn-xs' href="{{route('wishlist/create', $book->id)}}"><span class="glyphicon glyphicon-heart"></span> Guardar</a>
              </td>
              <td class="text-center">
                  <a class='btn btn-info btn-xs' href="{{route('booking/create', $book->id)}}"><span class="glyphicon glyphicon-edit"></span> Reservar</a>
              </td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection