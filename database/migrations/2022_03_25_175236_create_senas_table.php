<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('cod_categoria');
            $table->string('categoria');
            $table->char('estado');
            $table->timestamps();
        });
        
        
        Schema::create('senas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cod_categoria');
            $table->string('palabra');  
            $table->string('video');  
            $table->char('estado');  
            $table->char('letra');    
            $table->timestamps();
            $table->foreign('cod_categoria')
                   ->references('cod_categoria')
                   ->on('categorias')
                   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senas');
    }
}
