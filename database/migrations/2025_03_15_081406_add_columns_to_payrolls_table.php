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
        Schema::table('payrolls', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->after('id');
            $table->string('date_added')->nullable()->after('employee_id');
            $table->string('basic_salary_hours')->nullable()->after('date_added');
            $table->string('basic_salary_amount')->nullable()->after('basic_salary_hours');
            $table->string('reg_ot_hours')->nullable()->after('basic_salary_amount');
            $table->string('reg_ot_amount')->nullable()->after('reg_ot_hours');
            $table->string('rd_ot_hours')->nullable()->after('reg_ot_amount');
            $table->string('rd_ot_amount')->nullable()->after('rd_ot_hours');
            $table->string('pag_ibig')->nullable()->after('rd_ot_amount');
            $table->string('sss')->nullable()->after('pag_ibig');
            $table->string('philhealth')->nullable()->after('sss');
            $table->string('total_deductions')->nullable()->after('philhealth');
            $table->string('total_earnings')->nullable()->after('total_deductions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropColumn('employee_id');
            $table->dropColumn('date_added');
            $table->dropColumn('basic_salary_hours');
            $table->dropColumn('basic_salary_amount');
            $table->dropColumn('reg_ot_hours');
            $table->dropColumn('reg_ot_amount');
            $table->dropColumn('rd_ot_hours');
            $table->dropColumn('rd_ot_amount');
            $table->dropColumn('pag_ibig');
            $table->dropColumn('sss');
            $table->dropColumn('philhealth');
            $table->dropColumn('total_deductions');
            $table->dropColumn('total_earnings');
        });
    }
};
