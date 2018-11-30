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
            $table->integer('idtipo_item');
            $table->string('descricao');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    public function tipo_item()
    {
      return $this->hasOne('tipo_item', 'foreign_key', 'idtipo_item');
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
