<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('nip')->nullable()->after('email');
            $table->string('position')->nullable()->after('nip');
            $table->string('phone')->nullable()->after('position');
            $table->text('address')->nullable()->after('phone');
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['nip', 'position', 'phone', 'address']);
        });
    }
};
