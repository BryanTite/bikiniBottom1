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
        Schema::create('purchase_services', function (Blueprint $table) {
            $table->foreignId('id_purchase')->references('id')->on('purchase')->onDelete('cascade');;
            $table->foreignId('id_ticket')->references('id')->on('tickets')->onDelete('cascade');;

            $table->integer('quantity');
            $table->integer('price');

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
