<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaPessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pessoa')) {
            Schema::create('pessoa', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('email');
                $table->string('telefone', 25);
                $table->string('cidade');
                $table->enum('estado', ['PB', 'PE', 'RN', 'CE', 'BA']);
                $table->enum('categoria', ['Cliente', 'Fornecedor', 'Funcionário']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
}
