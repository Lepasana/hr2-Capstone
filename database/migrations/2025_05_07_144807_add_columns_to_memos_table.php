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
        Schema::table('memos', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->after('id');
            $table->text('from')->after('employee_id');
            $table->text('to')->after('from');
            $table->string('subject')->after('to');
            $table->date('date')->after('subject');
            $table->longText('content')->after('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memos', function (Blueprint $table) {
            $table->dropColumn('employee_id');
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('subject');
            $table->dropColumn('date');
            $table->dropColumn('content');
        });
    }
};
