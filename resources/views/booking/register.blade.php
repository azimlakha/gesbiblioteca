@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Efectuar Reserva
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('booking/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Data Hora da Reserva</label>

                            <div class="col-md-6">
                                <div class="input-group date">
                                <input size="16" type="datetime-local" value="" class="date form-control" min="2017-11-05" max="2018-06-30" name="start_date" required>
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>

                            @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="time" class="col-md-4 control-label">Ate:</label>

                            <div class="col-md-6">
                                <div class="input-group date">
                                <input size="16" type="datetime-local" value="" class="time form-control" name="end_date" required>
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>

                            @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                            @endif
                            </div>
                        </div>

                       <!-- <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duração</label>

                            <div class="col-md-6">
                                <select class="form-control" name="duration" required autofocus>
                                    <option value="">--Seleccione a duração--</option>
                                    <option value="15">15 Minutos</option>
                                    <option value="30">30 Minutos</option>
                                    <option value="45">45 Minutos</option>
                                    <option value="60">01 Hora</option>
                                    <option value="15">01h15 Minutos</option>
                                    <option value="30">01h30 Minutos</option>
                                    <option value="45">01h45 Minutos</option>
                                    <option value="60">02 Horas </option>
                                    <option value="15">02h15 Minutos</option>
                                    <option value="30">02h30 Minutos</option>
                                    <option value="45">02h45 Minutos</option>
                                    <option value="60">03 Horas </option>
                                </select>
                            </div>
                        </div>-->

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
                                    Registar
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

@endsection
