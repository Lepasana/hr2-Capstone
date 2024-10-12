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
        Schema::create('competency_management', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')
              ->nullable();
            $table->string('compentency')
              ->nullable();
            $table->string('skill_level')
              ->nullable();
            $table->string('proficiency')
              ->nullable();
            $table->text('notes')
              ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_management');
    }
};
