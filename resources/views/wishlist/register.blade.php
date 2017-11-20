@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Guardar Livro
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('wishlist/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$book->title}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<label type="hidden" for="title" class="col-md-4 control-label">Id do Livro</label>-->

                            <div class="col-md-6">
                                <input id="title" type="hidden" class="form-control" name="book_id" value="{{$book->id}}" readonly >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail" class="col-md-4 control-label">Capa</label>

                            <div class="col-md-6">
                                <img width="30%" class="img" src="{{ URL::asset('img/'.$book->thumbnail) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="publisher" class="col-md-4 control-label">Editora</label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control" name="publisher" value="{{$book->publisher->name}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edition" class="col-md-4 control-label">Edição</label>

                            <div class="col-md-6">
                                <input id="edition" type="text" class="form-control" name="edition" value="{{$book->edition}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pages" class="col-md-4 control-label">Páginas</label>

                            <div class="col-md-6">
                                <input id="pages" type="text" class="form-control" name="pages" value="{{$book->pages}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-md-4 control-label">Disciplina</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject" value="{{$book->subject->name}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="knowledge_area" class="col-md-4 control-label">Área de Conhecimento</label>

                            <div class="col-md-6">
                                <input id="knowledge_area" type="text" class="form-control" name="knowledge_area" value="{{$book->knowledge_area->name}}" readonly>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a class="btn btn-primary" href="{{ route('homepage') }}">
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