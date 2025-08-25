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
        Schema::table('audits', function (Blueprint $table) {
            $table->string('auditable_type')->nullable()->after('action');
            $table->unsignedBigInteger('auditable_id')->nullable()->after('auditable_type');
            $table->json('old_values')->nullable()->after('auditable_id');
            $table->json('new_values')->nullable()->after('old_values');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('audits', function (Blueprint $table) {
            $table->dropColumn(['auditable_type', 'auditable_id', 'old_values', 'new_values']);
        });
    }
};
