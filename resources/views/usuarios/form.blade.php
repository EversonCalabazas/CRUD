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
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(Request::is('*/edit'))
                    <form action="{{url('usuarios/update')}}/{{$usuarios->id}}" method="post">
                    @csrf
                        
                        
                        <div class="form-group">
                            <label for="inputNome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Insira o Nome" value="{{$usuarios->nome}}">
                        </div>
                            
                        <div class="form-group">
                            <label for="InputCPF">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="Insira o CPF" value="{{$usuarios->cpf}}"
                            minlength="11" maxlength="11">
                        </div>>
                                                
                        <div class="form-group">
                            <label for="InputNascimento">Nascimento</label>
                            <input type="date" name="dt_nascimento"class="form-control" placeholder="Insira a data de nascimento"
                            value="{{$usuarios->dt_nascimento}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" name="email"class="form-control" placeholder="Insira o email"
                            value="{{$usuarios->email}}">
                        </div>
                        <div class="form-group">
                            <label for="InputTelefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Insira o Telefone"
                            value="{{$usuarios->telefone}}">
                        </div>
                        <div class="form-group">
                            <label for="InputCEP">CEP</label>
                            <input type="text" name="cep" id="cep" class="form-control" placeholder="Insira o CEP" 
                            onblur="pesquisacep(this.value);" value="{{$usuarios->cep}}" minlength="8" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="InputEndereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Insira o Endereço"
                            value="{{$usuarios->endereco}}">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Insira a Cidade"
                            value="{{$usuarios->cidade}}">
                        </div>
                        <div class="form-group">
                            <label for="InputEstado">Estado</label>
                            <input type="text" name="estado" id="estado" class="form-control" placeholder="Insira o Estado"
                            value="{{$usuarios->estado}}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                    @else

                    <form action="{{url('usuarios/add')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label >Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Insira o Nome">
                        </div>
                        <div class="form-group">
                            <label >CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="Insira o CPF" 
                            minlength="11" maxlength="11">
                        </div>
                        <div class="form-group">
                            <label >Nascimento</label>
                            <input type="date" name="dt_nascimento"class="form-control" placeholder="Insira a data de nascimento">
                        </div>
                        <div class="form-group">
                            <label >E-mail:</label>
                            <input type="email" name="email"class="form-control" placeholder="Insira o email">
                        </div>
                        <div class="form-group">
                            <label >Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Insira o Telefone">
                        </div>
                        <div class="form-group">
                            <label >CEP</label>
                            <input type="text" name="cep" class="form-control" placeholder="Insira o CEP"
                            minlength="8" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label >Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Insira o Endereço">
                        </div>
                        <div class="form-group">
                            <label >Cidade</label>
                            <input type="text" name="cidade" class="form-control" placeholder="Insira a Cidade">
                        </div>
                        <div class="form-group">
                            <label >Estado</label>
                            <input type="text" name="estado" class="form-control" placeholder="Insira o Estado">
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
@push('script')

<script>
    function limpa_formulário_cep() {
            document.getElementById('endereco').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);

        } 
        else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('rua').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } 
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } 
        else {
            limpa_formulário_cep();
        }
    };
    </script>
@endpush