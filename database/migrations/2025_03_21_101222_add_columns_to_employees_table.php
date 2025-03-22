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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('civil_status')->after('gender')->nullable();
            $table->string('age')->after('civil_status')->nullable();
            $table->string('email')->after('age')->nullable();
            $table->text('present_address')->after('email')->nullable();
            $table->string('employee_code')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('civil_status');
            $table->dropColumn('age');
            $table->dropColumn('email');
            $table->dropColumn('present_address');
            $table->string('employee_code')->after('user_id')->change();
        });
    }
};
