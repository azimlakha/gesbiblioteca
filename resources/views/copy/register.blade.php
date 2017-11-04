@extends('layouts.app')

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
                                <label for="book_id" class="col-md-4 control-label">Livro</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="book_id" required autofocus>
                                        @foreach($books as $book)
                                            <option value="{{$book->id}}">{{$book->ISBN}}</option>
                                        @endforeach
                                    </select>
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

 <!--                           <div class="form-group{{ $errors->has('conservation') ? ' has-error' : '' }}">
                            <label for="conservation" class="col-md-4 control-label">Conservação</label>

                            <div class="col-md-6">
                                <select class="form-control" name="conservation" required autofocus>
                                    <option value="">--Seleccione o Estado de Conservação--</option>
                                    <option value="bom">Bom</option>
                                    <option value="restauracao">Em Restauração</option>
                                    <option value="danificado">Danificado</option>
                                    <option value="extraviado">Extraviado</option>
                                </select>
                            </div>
                        </div>
-->
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
