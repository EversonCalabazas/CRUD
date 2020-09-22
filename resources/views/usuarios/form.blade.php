@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('usuarios')}}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Request::is('*/edit'))
                    <form action="{{url('usuarios/update')}}/{{$usuarios->id}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Insira o Nome" value="{{$usuarios->nome}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="Insira o CPF" value="{{$usuarios->cpf}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nascimento</label>
                            <input type="text" name="dt_nascimento"class="form-control" placeholder="Insira a data de nascimento"
                            value="{{$usuarios->dt_nascimento}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" name="email"class="form-control" placeholder="Insira o email"
                            value="{{$usuarios->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Insira o Telefone"
                            value="{{$usuarios->telefone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Insira o Endereço"
                            value="{{$usuarios->endereco}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cidade</label>
                            <input type="text" name="cidade" class="form-control" placeholder="Insira a Cidade"
                            value="{{$usuarios->cidade}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Estado</label>
                            <input type="text" name="estado" class="form-control" placeholder="Insira o Estado"
                            value="{{$usuarios->estado}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CEP</label>
                            <input type="text" name="cep" class="form-control" placeholder="Insira o CEP" 
                            value="{{$usuarios->cep}}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                    @else

                    <form action="{{url('usuarios/add')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Insira o Nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="Insira o CPF">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nascimento</label>
                            <input type="text" name="dt_nascimento"class="form-control" placeholder="Insira a data de nascimento">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" name="email"class="form-control" placeholder="Insira o email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Insira o Telefone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Insira o Endereço">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cidade</label>
                            <input type="text" name="cidade" class="form-control" placeholder="Insira a Cidade">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Estado</label>
                            <input type="text" name="estado" class="form-control" placeholder="Insira o Estado">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CEP</label>
                            <input type="text" name="cep" class="form-control" placeholder="Insira o CEP">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
