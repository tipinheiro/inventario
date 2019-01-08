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
            $table->integer('tombamento');
            $table->integer('numserie');
            $table->string('descricao');
            $table->integer('idlocalizacao');
            $table->integer('idtipo_item');
            $table->integer('idsituacao');
            $table->string('motivo');
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
