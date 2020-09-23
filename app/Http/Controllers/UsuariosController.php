<?php

namespace App\Http\Controllers;

use App\Usuario;
use Redirect;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::get();
        return view('usuarios.list', ['usuarios' => $usuarios]);
    }

    public function new(){
        return view('usuarios.form');
    }

    public function add(Request $request){
        $validacao = $request->validate([
            'nome' => 'required|min:3|max:100',
            'cpf' => 'required|numeric|min:11',
            'dt_nascimento' => 'required|date',
            'email' => 'required',
            'telefone' => 'required|numeric',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required|numeric'
        ]); 
        $usuario = new Usuario;
        $usuario = $usuario->create($request->all() );
        return Redirect::to('/usuarios');
    }

    public function edit($id){
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.form', ['usuarios' => $usuario]);
    }

    public function update($id, Request $request){
        $validacao = $request->validate([
            'nome' => 'required|min:3|max:100',
            'cpf' => 'required|numeric|min:11',
            'dt_nascimento' => 'required|date',
            'email' => 'required',
            'telefone' => 'required|numeric',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required|numeric'
        ]);
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return Redirect::to('/usuarios');
    }

    public function delete($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return Redirect::to('/usuarios');
    }

    public function cep(Request $request)
    {
        $cep = $request->input('cep');
        $url = "http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=".$cep;
        $reg = simplexml_load_file($url);
        $dados['endereco'] = (string) $reg->tipo_logradouro.' '.$reg->logradouro;
        $dados['cidade'] = (string) $reg->cidade;
        $dados['estado'] = (string) $reg->uf;
        return $dados;
    }

}
 