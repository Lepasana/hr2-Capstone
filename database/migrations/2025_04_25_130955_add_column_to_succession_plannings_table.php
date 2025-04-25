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
            $table->string('promoted_status')->nullable()->after('request_status')->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('succession_plannings', function (Blueprint $table) {
            $table->dropColumn('promoted_status');
        });
    }
};
