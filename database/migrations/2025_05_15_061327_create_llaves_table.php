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
        Schema::create('llaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_Propietario_fk');
            $table->string('Tipo', 255);
            $table->string('Valor', 255)->unique();

            $table->foreign('Id_Propietario_fk')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llaves');
    }
};
