@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Localização
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('location.update', $location->id)}}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            <label for="section_id" class="col-md-4 control-label">Secção</label>

                            <div class="col-md-6">
                                <select class="form-control" name="section_id" required autofocus>
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}" {{$location->section_id == $section->id ? 'selected' : '' }}>{{$section->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bookcase_id') ? ' has-error' : '' }}">
                            <label for="bookcase_id" class="col-md-4 control-label">Estante</label>

                            <div class="col-md-6">
                                <select class="form-control" name="bookcase_id" required autofocus>
                                @foreach($bookcases as $bookcase)
                                    <option value="{{$bookcase->id}}" {{$location->bookcase_id == $bookcase->id ? 'selected' : '' }}>{{$bookcase->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shelf_id') ? ' has-error' : '' }}">
                            <label for="shelf_id" class="col-md-4 control-label">Prateleira</label>

                            <div class="col-md-6">
                                <select class="form-control" name="shelf_id" required autofocus>
                                @foreach($shelfs as $shelf)
                                    <option value="{{$shelf->id}}"{{$location->shelf_id == $shelf->id ? 'selected' : '' }}>{{$shelf->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a class="btn btn-primary" href="{{ route('location') }}">
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
