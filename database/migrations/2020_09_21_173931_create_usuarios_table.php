<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 128);
                $table->string('cpf', 12);
                $table->date('dt_nascimento');
                $table->string('email',128);
                $table->string('telefone',12);
                $table->string('endereco',128);
                $table->string('cidade',128);
                $table->string('estado',20);
                $table->string('cep',10);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
