@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registar Livro
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('book/store') }}">
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

                        <div class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                            <label for="edition" class="col-md-4 control-label">Edição</label>

                            <div class="col-md-6">
                                <input id="edition" type="text" class="form-control" name="edition" value="{{ old('edition') }}" required autofocus>

                                @if ($errors->has('edition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('edition') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ISBN') ? ' has-error' : '' }}">
                            <label for="ISBN" class="col-md-4 control-label">ISBN</label>

                            <div class="col-md-6">
                                <input id="ISBN" type="text" class="form-control" name="ISBN" value="{{ old('ISBN') }}" required autofocus>

                                @if ($errors->has('ISBN'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ISBN') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('publisher_id') ? ' has-error' : '' }}">
                            <label for="publisher_id" class="col-md-4 control-label">Editora</label>

                            <div class="col-md-6">
                                <select class="form-control" name="publisher_id" required autofocus>
                                @foreach($publishers as $publisher)
                                    <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
                            <label for="subject_id" class="col-md-4 control-label">Disciplina</label>

                            <div class="col-md-6">
                                <select class="form-control" name="subject_id" required autofocus>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('knowledge_area_id') ? ' has-error' : '' }}">
                            <label for="knowledge_area_id" class="col-md-4 control-label">Área de Conhecimento</label>

                            <div class="col-md-6">
                                <select class="form-control" name="knowledge_area_id" required autofocus>
                                @foreach($knowledge_areas as $knowledge_area)
                                    <option value="{{$knowledge_area->id}}">{{$knowledge_area->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author" class="col-md-4 control-label">Escolhe pelo menos um Autor</label>

                            <div class="col-md-6">
                                <select class="form-control input-lg" multiple="multiple" name="author[]" id="prettify data-placeholder" required>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
