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
        Schema::table('compensation_plans', function (Blueprint $table) {
            $table->string('job_category')->after('job_position_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compensation_plans', function (Blueprint $table) {
            $table->dropColumn('job_category');
        });
    }
};
