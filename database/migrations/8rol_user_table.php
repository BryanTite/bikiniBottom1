<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
    /**
    * Run the migrations.
    */
    public function up(): void
    {
        Schema::create('rol_user', function (Blueprint $table) {
        $table->foreignId('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');;

        $table->foreignId('id_user')->references('id_user')->on('users')->onDelete('cascade');;
        });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::table('rol_user', function (Blueprint $table) {
        $table->dropForeign('rol_user_id_rol_foreign');
        $table->dropForeign('rol_user_id_user_foreign');
        });
    }
    };
