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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->string('email')->unique(); // email unique
            $table->enum('role', ['ADMIN', 'CLIENT'])->default('CLIENT'); // rôle
            $table->string('password'); // mot de passe hashé
            $table->string('client_secret_hash')->nullable(); // hash HMAC, peut être null
            $table->enum('status', ['active', 'disabled'])->default('active'); // statut
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
