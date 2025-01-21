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
        Schema::create('nm_moduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modulID')->constrained('moduluak')->onDelete('cascade');
            $table->foreignId('userID')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nm_moduls');
    }
};
