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
        Schema::table('file_leaves', function (Blueprint $table) {
            $table->string('project_name')->nullable()->after('employee_id');
            $table->string('status')->nullable()->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file_leaves', function (Blueprint $table) {
            $table->dropColumn('project_name');
            $table->dropColumn('status');
        });
    }
};
