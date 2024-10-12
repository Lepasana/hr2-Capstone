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
        Schema::create('training_management', function (Blueprint $table) {
            $table->id();
            $table->string('training_name')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->timestamp('training_date')->nullable();
            $table->unsignedBigInteger('duration_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_management');
    }
};
