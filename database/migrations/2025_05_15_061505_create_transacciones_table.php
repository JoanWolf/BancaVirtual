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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('llave_fk');
            $table->date('Fecha_Envio');
            $table->float('Monto');
            $table->string('Referencia', 255);
            $table->string('Tipo', 255);
            $table->string('Estado', 255);


            $table->foreign('llave_fk')->references('id')->on('llaves');
            $table->unsignedBigInteger('Emisor_fk');
            $table->foreign('Emisor_fk')->references('id')->on('users');

            $table->unsignedBigInteger('Receptor_fk');
            $table->foreign('Receptor_fk')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
