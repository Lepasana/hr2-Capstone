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
            $table->string('department')->nullable()->after('current_position');
            $table->string('status')->nullable()->after('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('succession_plannings', function (Blueprint $table) {
            $table->dropColumn('department');
            $table->dropColumn('status');
        });
    }
};
