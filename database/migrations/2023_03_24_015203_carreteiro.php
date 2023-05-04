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
        //
        Schema::create('carreteiros', function (Blueprint $table ) {
            $table->id()->autoincrement();
            $table->string('nome', 200)->nullable(false);
            $table->string('cpf', 11)->nullable(false);
            $table->string('telefone', 11);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
           // $table->foreignId('veiculo_id')->constrained('veiculos');
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
