<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep'
    ];
}
