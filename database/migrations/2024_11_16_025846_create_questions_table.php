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
    Schema::create('questions', function (Blueprint $table) {
      $table->id();
      $table->foreignId('examination_id')
        ->references('id')
        ->on('examinations')
        ->cascadeOnDelete();
      $table->unsignedBigInteger('user_id')->nullable();
      $table->text('questions')->nullable();
      $table->json('options')->nullable();
      $table->string('correct_answer');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('questions');
  }
};
