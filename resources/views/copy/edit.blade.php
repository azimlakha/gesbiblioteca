@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Exemplar
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('copy.update', $copy->id)}}">
                        {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('book_id') ? ' has-error' : '' }}">
                                <label for="book_id" class="col-md-4 control-label">Livro</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="book_id" required autofocus disabled="disabled">
                                        @foreach($books as $book)
                                            <option value="{{$book->id}}"{{$copy->book_id == $book->id ? 'selected' : '' }}>{{$book->ISBN}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                                <label for="location_id" class="col-md-4 control-label">Localização</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="location_id" required autofocus>
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}"{{$copy->location_id == $location->id ? 'selected' : '' }}>{{$location->section->name.'_'.$location->bookcase->name.'_'.$location->shelf->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--<div class="form-group{{ $errors->has('copy_num') ? ' has-error' : '' }}">
                                <label for="copy_num" class="col-md-4 control-label">Número de exemplares</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="copy_num" required autofocus>
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>-->

                            <div class="form-group{{ $errors->has('shelf_id') ? ' has-error' : '' }}">
                                <label for="conservation" class="col-md-4 control-label">Disponibilidade</label>

                                <div class="col-md-6">
                                        <p><input class="form-control" type="radio" name="conservation" value="1"{{$copy->conservation == 1 ? 'checked' : '' }}> Disponível </p>
                                        <p><input class="form-control" type="radio" name="conservation" value="0"{{$copy->conservation == 0 ? 'checked' : '' }}> Indisponível</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                     <a class="btn btn-primary" href="{{ route('copy') }}">
                                   Cancel
                                </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
