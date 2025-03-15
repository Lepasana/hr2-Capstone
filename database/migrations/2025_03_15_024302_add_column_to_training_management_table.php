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
        Schema::table('training_management', function (Blueprint $table) {
            $table->datetime('date_completed')->nullable()->after('training_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_management', function (Blueprint $table) {
            $table->dropColumn('date_completed');
        });
    }
};
