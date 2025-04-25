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
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->after('id');
            $table->date('date')->after('employee_id');
            $table->time('time_from')->after('date');
            $table->time('time_to')->after('time_from');
            $table->string('shift_type')->after('time_to');
            $table->string('status')->default('scheduled')->after('shift_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('employee_id');
            $table->dropColumn('date');
            $table->dropColumn('time_from');
            $table->dropColumn('time_to');
            $table->dropColumn('shift_type');
            $table->dropColumn('status');
        });
    }
};
