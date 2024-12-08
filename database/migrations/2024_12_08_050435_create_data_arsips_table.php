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
        Schema::create('data_arsips', function (Blueprint $table) {
            $table->id();
            $table->string('name_file');
            $table->string('uploaded_file')->nullable();
            $table->string('status')->default('draft');
            $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();
            $table->string('file_type');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_arsips');
    }
};
