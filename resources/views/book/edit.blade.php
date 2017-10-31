@extends('layouts.app')
 
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Livro
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('book.update', $book->id)}}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}" required autofocus>

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
                                <input id="edition" type="text" class="form-control" name="edition" value="{{ $book->edition }}" required autofocus>

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
                                <input id="ISBN" type="text" class="form-control" name="ISBN" value="{{ $book->ISBN }}" required autofocus>

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
                                    <option value="{{$publisher->id}}"{{$book->publisher_id == $publisher->id ? 'selected' : '' }}>{{$publisher->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
                            <label for="subject_id" class="col-md-4 control-label">Disciplina</label>

                            <div class="col-md-6">
                                <select class="form-control" name="subject_id" required autofocus>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}"{{$book->subject_id == $subject->id ? 'selected' : '' }}>{{$subject->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('knowledge_area_id') ? ' has-error' : '' }}">
                            <label for="knowledge_area_id" class="col-md-4 control-label">Área de Conhecimento</label>

                            <div class="col-md-6">
                                <select class="form-control" name="knowledge_area_id" required autofocus>
                                @foreach($knowledge_areas as $knowledge_area)
                                    <option value="{{$knowledge_area->id}}"{{$book->knowledge_area_id == $knowledge_area->id ? 'selected' : '' }}>{{$knowledge_area->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                       <!-- <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author" class="col-md-4 control-label">Escolhe pelo menos um Autor</label>

                            <div class="col-md-6">
                                <select class="form-control input-lg js-multiple" multiple="multiple" name="author[]" id="js-multiple" required>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a class="btn btn-primary" href="{{ route('book') }}">
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
<script type="text/javascript">
$(document).ready(function() {
   $('#js-multiple').select2({
    placeholder: "Selecione o autor",
    allowClear: true
   }); 
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
@endsection
