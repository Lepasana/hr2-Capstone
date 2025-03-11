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
        Schema::table('competency_management', function (Blueprint $table) {
            $table->string('department')->nullable()->after('job_request_id');
            $table->removeColumn('competency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competency_management', function (Blueprint $table) {
            $table->dropColumn('department');
            $table->string('compentency')->nullable();
        });
    }
};
