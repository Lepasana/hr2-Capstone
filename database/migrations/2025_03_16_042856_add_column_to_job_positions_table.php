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
        Schema::table('job_positions', function (Blueprint $table) {
            $table->string("category")->nullable()->after('title');
            $table->string('regular_ot_pay')->nullable()->after('hourly_rate');
            $table->string('rest_day_ot_pay')->nullable()->after('regular_ot_pay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('regular_ot_pay');
            $table->dropColumn('rest_day_ot_pay');
        });
    }
};
