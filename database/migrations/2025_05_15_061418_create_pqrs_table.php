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
        Schema::create('pqrs', function (Blueprint $table) {
                $table->id();
                $table->string('Asunto', 50);
                $table->date('Fecha_Envio');
                $table->string('Estado', 50);
                $table->text('Descripcion');
                $table->text('Respuesta')->nullable();


                $table->unsignedBigInteger('Emisor_fk');
                $table->foreign('Emisor_fk')->references('id')->on('users');

                $table->unsignedBigInteger('Receptor_fk')->nullable();
                $table->foreign('Receptor_fk')->references('id')->on('users');
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};
