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
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id_projet'); // Clé primaire
            $table->string('titre', 255);
            $table->text('description');
            $table->date('date_limite');
            $table->string('status', 255)->default('en cours');
            $table->bigInteger('id')->unsigned()->nullable(); // Foreign key users
            $table->timestamps();

            // Index sur la colonne id (si utilisée comme relation)
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
