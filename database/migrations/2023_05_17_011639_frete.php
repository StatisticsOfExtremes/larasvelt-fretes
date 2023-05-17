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
        Schema::create('fretes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_carregamento')->nullable();
            $table->enum('status', ['carregando', 'em andamento', 'finalizado']);
            $table->foreignId('id_carreteiro');
            $table->foreignId('id_nota');
            $table->decimal('frete_carreteiro', 8, 2)->nullable();
            $table->decimal('pct_adiantamento', 8, 2)->nullable();
            $table->decimal('valor_carregamento', 8, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
