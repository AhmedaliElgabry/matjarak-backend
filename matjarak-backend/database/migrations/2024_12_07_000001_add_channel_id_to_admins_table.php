<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            // Add channel_id column (nullable for super admins)
            $table->unsignedInteger('channel_id')->nullable()->after('role_id');
            
            // Add foreign key constraint
            $table->foreign('channel_id')
                  ->references('id')
                  ->on('channels')
                  ->onDelete('cascade');
            
            // Add index for better query performance
            $table->index('channel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['channel_id']);
            
            // Drop index
            $table->dropIndex(['channel_id']);
            
            // Drop column
            $table->dropColumn('channel_id');
        });
    }
};
