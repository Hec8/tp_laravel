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
        Schema::create('taches', function (Blueprint $table) {
            $table->bigIncrements('id_tache'); // Clé primaire
            $table->string('titre', 255);
            $table->text('description');
            $table->string('statut', 255)->default('en cours');
            $table->text('priorite');
            $table->bigInteger('id_projet')->unsigned(); // Foreign key vers projets
            $table->bigInteger('id')->unsigned()->nullable(); // Foreign key vers une autre table si nécessaire
            $table->bigInteger('assigned_to')->unsigned()->nullable(); // Clé étrangère vers un utilisateur (optionnelle)
            $table->timestamps();

            // Contraintes de clé étrangère
            $table->foreign('id_projet')->references('id_projet')->on('projets')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
        
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
