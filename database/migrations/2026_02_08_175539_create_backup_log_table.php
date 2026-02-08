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
        Schema::create('backups_log', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->enum('type', ['full', 'incremental']); // type de backup
            $table->string('file_path'); // chemin du fichier
            $table->enum('status', ['success', 'failed']); // statut
            $table->text('notes')->nullable(); // notes optionnelles
            $table->timestamp('created_at'); // date de création
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups_log');
    }
};
