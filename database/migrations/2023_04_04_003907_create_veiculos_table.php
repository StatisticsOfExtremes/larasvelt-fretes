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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('placa', 7)->nullable(false);
            $table->string('antt', 10)->nullable();
            $table->string('nome_dono', 100);
            $table->string('identificacao_dono', 15);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
