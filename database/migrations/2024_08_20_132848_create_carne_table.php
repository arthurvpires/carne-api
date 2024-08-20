<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('carnes', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total', 8, 2);
            $table->decimal('valor_entrada', 8, 2)->nullable();
            $table->integer('qtd_parcelas');
            $table->date('data_primeiro_vencimento');
            $table->string('periodicidade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('carne');
    }
};
