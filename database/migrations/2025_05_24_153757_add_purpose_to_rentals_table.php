<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('rentals', function (Blueprint $table) {
        $table->text('purpose')->nullable()->after('fuel');
    });
}

public function down()
{
    Schema::table('rentals', function (Blueprint $table) {
        $table->dropColumn('purpose');
    });
}

};
