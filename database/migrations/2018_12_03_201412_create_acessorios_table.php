<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcessoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessorios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_serie');

            $table->integer('tipo_items_id')->unsigned();
            $table->foreign('tipo_items_id')->references('id')->on('tipo_items');

            $table->integer('equipamentos_id')->unsigned()->nullable();
            $table->foreign('equipamentos_id')->references('id')->on('equipamentos');

            $table->string('descricao');

            $table->integer('localizacaos_id')->unsigned();
            $table->foreign('localizacaos_id')->references('id')->on('localizacaos');

            $table->integer('situacaos_id')->unsigned();
            $table->foreign('situacaos_id')->references('id')->on('situacaos');

            $table->timestamps();
        });
    }

    public function tipo_item()
    {
      return $this->hasOne('inventario\tipo_item');
    }

    public function localizacao()
    {
      return $this->hasOne('inventario\localizacao');
    }

    public function situacao()
    {
      return $this->hasOne('inventario\situacao');
    }

    public function equipamento()
    {
      return $this->hasOne('inventario\Equipamento');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acessorios');
    }
}
