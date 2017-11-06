@extends('layouts.app')
 
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
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



                        <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                            <label>Upload Image</label>
                            <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse… <input type="file" id="imgInp" required>
                                    </span>
                                </span>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <img id='img-upload'/>
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

<
                        <div class="form-group{{ $errors->has('pages') ? ' has-error' : '' }}">
                            <label for="pages" class="col-md-4 control-label">Páginas</label>

                            <div class="col-md-6">
                                <input id="pages" type="text" class="form-control" name="pages" value="{{ old('pages') }}" required autofocus>

                                @if ($errors->has('pages'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pages') }}</strong>
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
                                <select class="form-control input-lg js-multiple" multiple="multiple" name="author[]" id="js-multiple" required>
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

<script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
    });
</script>
@endsection
