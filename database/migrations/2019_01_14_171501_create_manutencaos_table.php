<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManutencaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencaos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('idequipamento')->nullable();
            $table->integer('idacessorio')->nullable();
            $table->string('problema');
            $table->string('solucao')->nullable();
            $table->date('data_envio');
            $table->date('data_retorno');
            $table->integer('idsituacao');
            $table->integer('idusuario');
            $table->timestamps();
            });
    }

    public function tipo_item()
    {
      return $this->hasOne('tipo_item', 'foreign_key', 'idtipo_item');
    }

    public function movimentos()
    {
      return $this->hasMany('movimentos');
    }

    public function situacao()
    {
      return $this->hasOne('situacao', 'foreign_key', 'idsituacao');
    }

    public function acessorios()
    {
      return $this->hasMany('acessorios');
    }

    public function users()
    {
      return $this->hasMany('users');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencaos');
    }
}
