@extends('layouts.app')
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registar Exemplar
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('copy/store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('book_id') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="book_id" type="hidden" class="form-control" name="book_id" value="{{ $book->id }}">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}" readonly>
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                                <label for="location_id" class="col-md-4 control-label">Localização</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="location_id" required autofocus>
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->section->name.'_'.$location->bookcase->name.'_'.$location->shelf->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('copy_num') ? ' has-error' : '' }}">
                                <label for="copy_num" class="col-md-4 control-label">Número de exemplares</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="copy_num" required autofocus>
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Notas</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" id="notes" class="form-control" name="notes" value="{{ old('notes') }}" autofocus>
                                </textarea>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registar
                                    </button>
                                     <a class="btn btn-primary" href="{{route('book')}}">
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
