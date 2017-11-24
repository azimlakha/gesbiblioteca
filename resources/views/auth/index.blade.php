@extends('layouts.app')
@extends('layouts.admin')

@section('content') 
<div class="container">
    <div class="row col-md-10 col-md-offset-1 custyle">

    @if(Session::has('message'))
      <div class='alert alert-success'>{{ Session::get('message') }}</div>
    @endif

    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
    <thead>
    <a href="signup_su" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar novo Utilizador</a>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Perfil</th>
            <th class="text-center">Acção</th>
        </tr>
    </thead>
            @foreach($users as $user)
           <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->profile->code}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->profile->surname}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->profile->phone}}</td>
               <td>{{$user->profile->profile}}</td>
               <td class="text-center">


               <a class='btn btn-info btn-xs' href="{{ route('edituser', $user->id ) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
           </tr>
           @endforeach
    </table>
    </div>
</div>

@endsection