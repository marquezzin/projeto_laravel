<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //criando tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //criando tabela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filial_id');
            $table->float('preco_venda', 8, 2)->default(0.01); //oito digitos sendo 2 apos a virgula
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();

            //fk(constraints)
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('filial_id')->references('id')->on('filiais');
        });
        //removendo colunas da tabela produto
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //adicionar colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->float('preco_venda', 8, 2)->default(0.01); //oito digitos sendo 2 apos a virgula
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });
        //removendo tabelas
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
