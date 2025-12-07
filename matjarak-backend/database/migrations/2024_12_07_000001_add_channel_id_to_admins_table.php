<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('admins', 'channel_id')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->unsignedInteger('channel_id')->nullable()->after('role_id');
                $table->index('channel_id');
            });
        }
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('channel_id');
        });
    }
};
