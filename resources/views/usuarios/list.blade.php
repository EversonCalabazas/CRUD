@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url ('usuarios/new')}}">Novo Usuário</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de Usuários</h1>
                        
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach( $usuarios as $u)
                        <tr>
                        <th scope="row">{{$u -> id}}</th>
                        <td>{{$u -> nome}}</td>
                        <td>{{$u -> email}}</td>
                        <td>
                            <a href="usuarios/{{$u->id}}/edit" class="btn btn-info">Editar</a>
                        </td>
                        <td>
                            <form action="usuarios/delete/{{$u->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
