<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tombamento')->unique();
            $table->string('numero_serie');
            $table->integer('ano');
            $table->string('descricao');
            $table->integer('idtipo_item');
            $table->integer('idlocalizacao');
            $table->integer('idsituacao');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
}
