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
        Schema::create('purchases_services', function (Blueprint $table) {
            $table->id();
            //id_purchase-> el nombre del campo tabla
            $table->foreignId('id_purchase')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreignId('id_ticket')->references('id')->on('tickets')->onDelete('cascade');

            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_services');
    }
};
