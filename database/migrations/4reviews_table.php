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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review');
            $table->foreignId('id_user')->references('id_user')->on('users')->onDelete('cascade');;
            $table->foreignId('id_categorie')->references('id_categorie')->on('categories')->onDelete('cascade');;
            $table->integer('ratings');
            $table->string('comment');
            $table->timestamp('date');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
