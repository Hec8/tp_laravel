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
            $table->bigIncrements('id_tache'); // clé primaire personnalisée
            $table->string('titre');
            $table->text('description');
            $table->string('statut')->default('en cours');
            $table->text('priorite');
            $table->foreignId('id_projet')->constrained('projets')->onDelete('cascade');
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps();

            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
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
