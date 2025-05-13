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
        Schema::table('succession_plannings', function (Blueprint $table) {
            $table->string('promoted_to')->nullable()->after('current_position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('succession_plannings', function (Blueprint $table) {
            $table->dropColumn('promoted_to');
        });
    }
};
