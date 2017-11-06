@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registar Secção</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('asset/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('component') ? ' has-error' : '' }}">
                            <label for="component" class="col-md-4 control-label">Seleccione</label>

                            <div class="col-md-6">
                                <select class="form-control" name="component" required autofocus>
                                    <option value="">--Seleccione--</option>
                                    <option value="section">Secção</option>
                                    <option value="bookcase">Estante</option>
                                    <option value="shelf">Prateleira</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('component_num') ? ' has-error' : '' }}">
                                <label for="component_num" class="col-md-4 control-label">Número</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="component_num" required autofocus>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('prefix') ? ' has-error' : '' }}">
                            <label for="prefix" class="col-md-4 control-label">Prefixo</label>

                            <div class="col-md-6">
                                <input id="prefix" type="text" class="form-control" name="prefix" value="{{ old('prefix') }}" required autofocus>

                                @if ($errors->has('prefix'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prefix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registar
                                </button>
                                 <a class="btn btn-primary" href="#">
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
