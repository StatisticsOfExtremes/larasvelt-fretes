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
        Schema::create('carreteiro_veiculo', function (Blueprint $table) {

            $table->foreignId('veiculo_id')
            ->constrained('veiculos')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('carreteiro_id')
            ->constrained('carreteiros')->onUpdate('cascade')->onDelete('cascade');

            $table->index(['veiculo_id', 'carreteiro_id']);
            
            $table->boolean('ativo');
    
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreteiros_veiculos');
    }
};
